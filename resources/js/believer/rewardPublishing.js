$(document).on("click", ".publishReward", function() {

    var rewardId = $(this).attr('data-item-id');
    var state = $(this).attr('data-state');

    if(state == 1){
        result = makeAjaxCallForPublish(rewardId, 0); // it's on - so turn it off
        $(this).attr('data-state', 0); //set the current state to off
        $(this).removeClass( "fa-toggle-on" ).addClass( "fa-toggle-off" );
    } else {
        result = makeAjaxCallForPublish(rewardId, 1); // turn it on
        $(this).attr('data-state', 1); //set the current state to om
        $(this).removeClass( "fa-toggle-off" ).addClass( "fa-toggle-on" );
    }
});


function makeAjaxCallForPublish(id, state){
    //data = JSON.stringify({ id: id, active_status: state });
    $.ajax({
        url: '/admin/toggleRewardPublish',
        type: 'POST',
        dataType: 'json',
        data: {
            id: id,
            active_status: state
        },
    });

    return true;
}



