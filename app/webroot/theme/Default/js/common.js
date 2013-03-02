//===== JOKO ADD =====//    
function setCountryAjax(triggerId, renderId, action) {
    $('#' + triggerId).live('change', function(){
        if ($(this).val().length != 0) {
            $.getJSON(action, {countryId: $(this).val()}, function(stateList){
                if (stateList != null) {
                    populateStateList(renderId, stateList);
                }
            });
        }
    });
}

function populateStateList(renderId, stateList) {
    var options = '';
    $.each(stateList, function(index, state){
        options += '<option value="' + index + '">'+ state +'</option>' ;           
    });
    $('#' + renderId).html(options);        
}

$.fn.numbersOnly = function(){
    return this.each(function(){
        $(this).keydown(function(e){
            var key = e.charCode || e.keyCode || 0;
            // allow backspace, tab, delete, arrows, numbers and keypad numbers ONLY
            // key == 188 => ,
            // key == 190 => .
            return (key == 8 || key == 9 || key == 46 || (key >= 37 && key <= 40) ||(key >= 48 && key <= 57) || (key >= 96 && key <= 105));
        });
    });
};

$.fn.setUppercase = function(){
    $(this).keyup(function(){
        $(this).val($(this).val().toUpperCase());
    });
};