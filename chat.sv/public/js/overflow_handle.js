var overflow_handle = {
    pushOverflowUser: function (uid){
        $('<div class="user_overflow" id="_user_overflow_'+uid+'">'
            +'<div class="user_overflow_inner" id="'+uid+'">'
            +'<div class="_name" id="'+uid+'">'+friendsName[uid]+'</div>'
            +'<a class="_close" title="Đóng tab" id="'+uid+'"></a>'
            +'</div>'
            +'</div>').insertBefore('._list_push');
    },

    removeOverFlowUser: function (uid){
        $("[id = "+'_user_overflow_'+uid+"]").remove();
        $("[id = "+'_msg_box_'+uid+"]").remove();
        $("[id = "+'_msg_box_down_'+uid+"]").remove();
    },

    hideOverflowTags: function (){
        $('.overflow_tab').css({"display":"none"});
        $('.overflow_list').css({"display":"none"});
        $('.strike_cover').css({"display":"none"});
    },

    showOverflowTags:function (){
        var numberOverflowTabs = (tabs.length - 3);
        $('.overflow_tab').css({"display":"block"});
        $('.number_of_tabs').text(numberOverflowTabs);
        // $('.overflow_list').css({"display":"block"});
        // $('.strike_cover').css({"display":"block"});
    }
}
