// @author Ankit Verma
function av_alert(title_text, msg, msg_type, icon_name, escape, clmClass){

    if(escape===null || escape==="" || escape===undefined){escape = true;}
    if(clmClass===null || clmClass==="" || clmClass===undefined){clmClass = "col-md-4 col-md-offset-4";}

    if(msg_type=="success"){
        type_color = "green";
        if(icon_name===null || icon_name==="" || icon_name===undefined){icon_name = "fas fa-check-double";}
    }else if(msg_type=="warning"){
        type_color = "red";
        if(icon_name===null || icon_name==="" || icon_name===undefined){icon_name = "fas fab fa-expeditedssl";}
    }else if(msg_type=="error"){
        type_color = "red";
        if(icon_name===null || icon_name==="" || icon_name===undefined){icon_name = "far fa-frown";}
    }else{
        type_color = "blue";
        if(icon_name===null || icon_name==="" || icon_name===undefined){icon_name = "fas fa-tick";}
    }
    $.dialog({
        title: title_text,
        content: msg,
        theme: 'bootstrap',
        animationBounce: 2, 
        type: type_color,
        columnClass: clmClass,
        icon: icon_name,
        backgroundDismiss: true,
        animation: 'rotateXR (reverse)',
        animationSpeed: 800,
        escapeKey: escape,
    });
}