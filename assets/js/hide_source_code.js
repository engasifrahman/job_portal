//////////F12 disable code////////////////////////
document.onkeypress = function (event) {
    event = (event || window.event);
    if (event.keyCode == 123) {
       //alert('No F-12');
        return false;
    }
}
document.onmousedown = function (event) {
    event = (event || window.event);
    if (event.keyCode == 123) {
        //alert('No F-keys');
        return false;
    }
}
document.onkeydown = function (event) {
    event = (event || window.event);
    if (event.keyCode == 123) {
        //alert('No F-keys');
        return false;
    }
}
$(document).keydown(function(e){
    if(e.which === 123){
       return false;
    }
});
/////////////////////end///////////////////////
 
//Disable right click script 
//visit http://www.rainbow.arch.scriptmania.com/scripts/ 
var message="Sorry, right-click has been disabled"; 
/////////////////////////////////// 
function clickIE()
{
    if (document.all)
    {
        alert(message);
        return false;
    }
} 
function clickNS(e) 
{
    if (document.layers||(document.getElementById&&!document.all))
    { 
        if (e.which==2||e.which==3)
        {
            alert(message);
            return false;
        }
    }
}
if (document.layers)
{
    document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;
} 
else
{
    document.onmouseup=clickNS;
    document.oncontextmenu=clickIE;
} 
document.oncontextmenu=new Function("return false")
// 
function disableCtrlKeyCombination(e)
{
    //list all CTRL + key combinations you want to disable
    var forbiddenKeys = new Array('a', 'n', 'c', 'x', 'v', 'j' , 'w', 'u');
    var key;
    var isCtrl;
    if(window.event)
    {
        key = window.event.keyCode;     //IE
        if(window.event.ctrlKey)
            isCtrl = true;
        else
        isCtrl = false;
    }
    else
    {
        key = e.which;     //firefox
        if(e.ctrlKey)
            isCtrl = true;
        else
            isCtrl = false;
    }
    //if ctrl is pressed check if other key is in forbidenKeys array
    if(isCtrl)
    {
        for(i=0; i<forbiddenKeys.length; i++)
        {
            //case-insensitive comparation
            if(forbiddenKeys[i].toLowerCase() == String.fromCharCode(key).toLowerCase())
            {
            alert('Key combination CTRL + '+String.fromCharCode(key) +' has been disabled.');
            return false;
            }
        }
    }
    return true;
}
 
//ctrl+u not allowed
/*
document.onkeydown = function(e) {
        if (e.ctrlKey && 
             e.keyCode === 85) {
            alert('not allowed');
            return false;
        } else {
            return true;
        }
};
*/