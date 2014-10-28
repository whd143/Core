/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function () {

    /**
     * Initialise tinyMCE text editor*******************************************
     */
    if ($('textarea.tinymce').length) {
        $('textarea.tinymce').tinymce({
            // Location of TinyMCE script
            script_url: 'tinymce/tiny_mce.js',
            // General options
            theme: "advanced",
            plugins: "pagebreak,style,layer,table,save,advhr,advimage,advlink,iespell,inlinepopups,insertdatetime,preview,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",
            // Theme options
            theme_advanced_buttons1: "save,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
            theme_advanced_buttons2: "cut,copy,paste,pastetext|,search,replace,|,bullist,numlist,|blockquote,|,undo,redo, anchor,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor,",
            theme_advanced_buttons3: "hr,sub,sup",
            theme_advanced_toolbar_location: "top",
            theme_advanced_toolbar_align: "left",
            theme_advanced_statusbar_location: "bottom",
            theme_advanced_resizing: true,
            // Example content CSS (should be your site CSS)
            //content_css: "css/content.css",
            // Drop lists for link/image/media/template dialogs
            template_external_list_url: "lists/template_list.js",
            external_link_list_url: "lists/link_list.js",
            external_image_list_url: "lists/image_list.js",
            media_external_list_url: "lists/media_list.js",
            // Replace values for the template plugin
            template_replace_values: {
                username: "Some User",
                staffid: "991234"
            }
        });
    }

    /**
     *  apply form validation 
     */
    if ($('#validate').length) {
        alert('abc');
        $('#validate').validationEngine({
            promptPosition: "bottomLeft",
            scroll: false
        });
    }

    /**
     * 
     */
    var oTable;
    if ($('#stopNGTable').length) {
        oTable = $('#stopNGTable').dataTable();
        //$('#example').DataTable();
    }



});