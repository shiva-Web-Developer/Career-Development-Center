const divInstall=document.getElementById("installBtnContainer");
const butInstall=document.getElementById("installButton");

if("serviceWorker"in navigator){navigator.serviceWorker.register("https://app.cdc-azamgarh.com//sw.js");}
if(window.location.protocol==="http:"){
    const requireHTTPS=document.getElementById("requireHTTPS");
    const link=requireHTTPS.querySelector("a");
    link.href=window.location.href.replace("http://","https://");
    requireHTTPS.classList.remove("hidden");
    
}
window.addEventListener('beforeinstallprompt',(event)=>{
    console.log('ðŸ‘','beforeinstallprompt',event);
    window.deferredPrompt=event;divInstall.classList.toggle('hidden',false);});
    butInstall.addEventListener('click',()=>{console.log('ðŸ‘','butInstall-clicked');
    const promptEvent=window.deferredPrompt;
    if(!promptEvent){
        return;
        
    }
promptEvent.prompt();
promptEvent.userChoice.then((result)=>{
    console.log('ðŸ‘','userChoice',result);
    window.deferredPrompt=null;
    divInstall.classList.toggle('hidden',true);
    
});});window.addEventListener('appinstalled',(event)=>{console.log('ðŸ‘','appinstalled',event);});