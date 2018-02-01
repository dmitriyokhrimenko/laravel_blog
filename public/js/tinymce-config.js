var editor_config = {
            path_absolute : "/",
            selector: '#body',
            plugins: 
                [
                    "advlist autoresize autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table contextmenu directionality",
                    "emoticons template paste textcolor colorpicker textpattern imagetools"
                ],
            autoresize_max_height: 300,
            menubar: false,
            toolbar1: "alignleft aligncenter alignright alignjustify | bold italic underline strikethrough | formatselect fontselect fontsizeselect",
            toolbar2: "bullist numlist | blockquote | link unlink image | preview | forecolor backcolor | table | hr removeformat | subscript superscript | charmap emoticons",
            textcolor_map: 
                [
                    "000000", "Black",
                    "993300", "Burnt orange",
                    "333300", "Dark olive",
                    "003300", "Dark green",
                    "003366", "Dark azure",
                    "000080", "Navy Blue",
                    "333399", "Indigo",
                    "333333", "Very dark gray",
                    "800000", "Maroon",
                    "FF6600", "Orange",
                    "808000", "Olive",
                    "008000", "Green",
                    "008080", "Teal",
                    "0000FF", "Blue",
                    "666699", "Grayish blue",
                    "808080", "Gray",
                    "FF0000", "Red",
                    "FF9900", "Amber",
                    "99CC00", "Yellow green",
                    "339966", "Sea green",
                    "33CCCC", "Turquoise",
                    "3366FF", "Royal blue",
                    "800080", "Purple",
                    "999999", "Medium gray",
                    "FF00FF", "Magenta",
                    "FFCC00", "Gold",
                    "FFFF00", "Yellow",
                    "00FF00", "Lime",
                    "00FFFF", "Aqua",
                    "00CCFF", "Sky blue",
                    "993366", "Red violet",
                    "FFFFFF", "White",
                    "FF99CC", "Pink",
                    "FFCC99", "Peach",
                    "FFFF99", "Light yellow",
                    "CCFFCC", "Pale green",
                    "CCFFFF", "Pale cyan",
                    "99CCFF", "Light sky blue",
                    "CC99FF", "Plum"
                ],
                relative_urls: false,
                file_browser_callback : function(field_name, url, type, win) {
                    var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                    var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
                    
                    var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                    if (type == 'image') {
                      cmsURL = cmsURL + "&type=Images";
                    } else {
                      cmsURL = cmsURL + "&type=Files";
                    }

                    tinyMCE.activeEditor.windowManager.open({
                      file : cmsURL,
                      title : 'Filemanager',
                      width : x * 0.8,
                      height : y * 0.8,
                      resizable : "yes",
                      close_previous : "no"
                    });
                }
            };
            tinymce.init(editor_config);