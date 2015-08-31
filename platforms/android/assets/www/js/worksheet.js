var worksheet = {
    
    // object constructor
    initialize: function(){
        // check if worksheet in progress
        if (window.localStorage.getItem('worksheetstatus') === null | window.localStorage.getItem('worksheetstatus') === "0") {
            // not in progress
            this.start();
        }else if(window.localStorage.getItem('worksheetstatus') === "1"){
            // worksheet busy, redirect to page
            window.location.assign('worksheet.html');
        }else{
            // continue
        }
    },
    
    start: function(){
        // create local storage
        window.localStorage.setItem('worksheetstatus', '1');
        
        // send to worksheet page
        window.location.assign('worksheet.html');
    },
    
    
    flush: function(){
        window.localStorage.removeItem('worksheetstatus');
    },
    
    
    
}