
/*
 *
 * CKAN API JS API CLIENT
 * ----------------------
 * 
 * Autor
 * -----
 * Jorge Pantoja
 * Dirección Nacional de Innovación
 * Secretaría Nacional de la Administración Pública 
 * Gobierno Central del Ecuador 
 * 
 * To create this graphs we use three well known libraries:
 * --------------------------------------------------------
 * - Charts JS
 * - Google Charts
 * - Flot Charts (JQuery)
 * 
 * For Responsive Google Charts:
 * -----------------------------
 * http://jsfiddle.net/toddlevy/c59HH/
 * http://stackoverflow.com/questions/23846828/google-charts-api-responsive-design
 * 
 */

function data_graph () {
	
    this.api_data_server;
    this.api_catalog_name;
    this.api_resource_name;
    this.api_user;
    this.api_key;
    this.data_dict;
    this.json_data;
    this.url;
    
    this.get_data_package = function() {
    	this.url = this.api_data_server + '/api/3/action/package_show?id=' + this.api_catalog_name;
    	this.json_data = $.ajax({url: this.url,async: false,dataType: 'json'});
    	this.data_dict = $.parseJSON(this.json_data.responseText);
    	this.data_dict = this.data_dict.result;
    	return this.data_dict;
    };
    
    this.get_data_resource = function() {
    	this.url = this.api_data_server + '/api/action/datastore_search?resource_id=' + this.api.resource_name;
    	this.json_data = $.ajax({url: this.url,async: false,dataType: 'json'});
    	this.data_dict = $.parseJSON(this.json_data.responseText);
    	return this.data_dict;
    };
    
    this.get_package_meta_data = function() {
    	this.get_data_package();
    	var dataset_metadata = {};
	    
		dataset_metadata.license_title = {'value': this.data_dict.license_title, 'title': 'License'};
		dataset_metadata.license_id = {'value': this.data_dict.license_id, 'title': 'License ID'};
		dataset_metadata.metadata_modified = {'value': this.data_dict.metadata_modified, 'title': 'Last Modified Date'};
		dataset_metadata.maintainer = {'value': this.data_dict.maintainer, 'title': 'Maintainer'};
		dataset_metadata.maintainer_email = {'value': this.data_dict.maintainer_email, 'title': 'Maintainer_email'};
		dataset_metadata.metadata_created = {'value': this.data_dict.metadata_created, 'title': 'Creation Date'};
		dataset_metadata.author = {'value': this.data_dict.author, 'title': 'Author'};
		dataset_metadata.author_email = {'value': this.data_dict.author_email, 'title': 'Author Email'};
		dataset_metadata.num_resources = {'value': this.data_dict.num_resources, 'title': 'Total Number of Resources'};
		dataset_metadata.title = {'value': this.data_dict.title, 'title': 'Title'};
		
		//Resources (Download Files)
		var resources = {};
	    $.each(this.data_dict.resources, function(value,key){
	    	resources[value] = {'value': key.url, 'title': 'Resource URL'};
	    });
	    resources.title = 'Resources';
	    dataset_metadata.resources = resources;
	    
	    //Extra Metadata included
	    var extras = {};
	    $.each(this.data_dict.extras, function(value,key){
	    	extras[value] = {'key': {'value': key.key, 'title': 'Extra Key'}, 'value': {'value': key.value, 'title': 'Additional Metadata'}};
	    });
	    extras.title = 'Extras';
    	dataset_metadata.extras = extras;
    	
    	return dataset_metadata;
    };
    
    this.get_resource_meta_data = function() {
    	this.get_data_resource();
    	var resource_metadata = {};
    	
    	//resource_metadata.license_title = {'value': this.data_dict.license_title, 'title': 'License'};
    	
    	return resource_metadata;
    };
    
    this.get_bar_chart = function(label_title, id_div, legend_div, data_labels, data_content) {
    	
    	//Vendor Library: Chartjs
    	
		var barChartData = {
			
			labels : data_labels, //Ex: ["IMBABURA","TUNGURAHUA"]
			
			datasets : [
				{
					label: label_title, //
					
					fillColor : "rgba(220,220,220,0.5)",
					strokeColor : "rgba(220,220,220,0.8)",
					highlightFill: "rgba(220,220,220,0.75)",
					highlightStroke: "rgba(220,220,220,1)",
					
					data : data_content //Ex: [255,259]
					
				}
			]
		};
			
		var ctx = document.getElementById(id_div).getContext("2d");
		var myLineChart = new Chart(ctx).Bar(barChartData,{responsive:true});
		legend(document.getElementById(legend_div), barChartData);
    	
    };
    
    this.get_radar_chart = function(label_titles, id_div, legend_div, data_labels, data_content) {
    	
    	//Vendor Library: Chartjs
		
		var datasets_merged = [];
		
		$.each(data_content, function(key,value) {
	    	
			dataset_temp = {
								label: label_titles[key],
								fillColor: "rgba(220,220,220,0.2)",
								strokeColor: "rgba(220,220,220,1)",
								pointColor: "rgba(220,220,220,1)",
								pointStrokeColor: "#fff",
								pointHighlightFill: "#fff",
								pointHighlightStroke: "rgba(220,220,220,1)",
								data: value
						   };		
			
			datasets_merged.push(dataset_temp);
	    	
	    });
	    
		var radarChartData = {
			labels: data_labels,
			datasets: datasets_merged
		};
		
		window.myRadar = new Chart(document.getElementById(id_div).getContext("2d")).Radar(radarChartData, {responsive: true});
		legend(document.getElementById(legend_div), radarChartData);
    	
    };
    
    this.get_line_chart = function() {
    };
    
    this.get_pie_chart = function() {
    };
    
}