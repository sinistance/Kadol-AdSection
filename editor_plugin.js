function adsection() {
	var selection = tinymce.activeEditor.selection.getSel();
	
	if (selection != '') {
		return '[adsection]'+selection+'[/adsection]';
	} else {
		return selection;
	}
}

(function() {

    tinymce.create('tinymce.plugins.adsection', {

        init : function(ed, url){
            ed.addButton('adsection', {
                title : 'Insert AdSection',
				image: url + "/google.png",
                onclick : function() {
                    ed.execCommand(
                        'mceInsertContent',
                        false,
                        adsection()
                        );
                }
            });
        },
		createControl : function(n, cm) {
		            return null;
		},
		getInfo : function() {
		            return {
		                longname : "Kadol AdSection",
		                author : 'Surya Darma',
		                authorurl : 'http://sinistance.com/',
		                infourl : 'http://sinistance.com/',
		                version : "1.0"
		            };
		  }
    });

    tinymce.PluginManager.add('adsection', tinymce.plugins.adsection);
    
})();
