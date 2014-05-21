(function($){
    var $navTabs = $('#alisios-tabs');

    if($navTabs) {
        var $tableTabs = $('table.alisiostab'),
            activeTab = window.location.hash.replace("#top#",""),

            toggleTab = function(idTab){
                //removeClass
                $navTabs.find('a').removeClass('nav-tab-active');
                $tableTabs.removeClass('active');
                //addClass
                $('#'+idTab).addClass('active');
                $('#'+idTab+'-tab').addClass('nav-tab-active');
            };

        //toggle in nav
        $navTabs.find('a').on('click', function(){
            var idTab = $(this).attr('id').replace('-tab','');
            toggleTab(idTab);
        });

        //toggle in load
        if(isset(activeTab) && $('#'+activeTab)) {
            toggleTab(activeTab);
        }
    }


    console.log('alision admin done!');
})(jQuery);