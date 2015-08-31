var worksheet = {
    
    // object constructor
    initialize: function(id){
        
        if(id === undefined){
            id = window.localStorage.getItem('id');
        }else{
            window.localStorage.setItem('id', id);
        }
        
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
        
        window.localStorage.setItem('date', stopwatch.getCurrentDate());
        
        window.localStorage.setItem('material', "{}");
        
        // send to worksheet page
        window.location.assign('worksheet.html');
    },
    
    finish: function(sheetType, CRMNumber, CRMDate, signature){
        // create object with all data
        var stopwatchdata = JSON.parse(window.localStorage.getItem('stopwatch'));
        
        if(window.localStorage.getItem('addCompany')){
            var company = JSON.parse(window.localStorage.getItem('addCompany'));
        }else{
            var company = false;
        }
        
        var worksheet2 = {
            worksheetstatus: window.localStorage.getItem('worksheetstatus'),
            user: window.localStorage.getItem('userid'),
            stopwatch: stopwatchdata,
            notes: window.localStorage.getItem('notes'),
            client: window.localStorage.getItem('clientid'),
            expenses: window.localStorage.getItem('expenses'),
            date : window.localStorage.getItem('date'),
            addCompany : company,
            material : window.localStorage.getItem('material'),
            sheetType : sheetType,
            CRMNumber : CRMNumber,
            CRMDate : CRMDate,
            signature : signature
        };
        
        // send object to online handler
        $.post('http://localhost/inventOnline/worksheet.php', {worksheet: worksheet2},
        //$.post('172.19.93.162/inventOnline/worksheet.php', {username: username, password: password},
        function(data) {
            
            worksheet.wrap();
            
            // flush all data
            worksheet.flushAll();
            
            // send to index
            window.location.assign('index.html');
            console.log(data);
            
        });
        
    },
    
    flush: function(){
        window.localStorage.removeItem('worksheetstatus');
        window.localStorage.removeItem('notes');
        window.localStorage.removeItem('id');
        window.localStorage.removeItem('date');
        window.localStorage.removeItem('material');
    },
    
    flushAll: function(){
        client.flush();
        stopwatch.flush();
        worksheet.flush();
    },
    
    wrap: function(){
        
        // create object with all data
        var stopwatch = JSON.parse(window.localStorage.getItem('stopwatch'));
        
        var worksheet = {
            worksheetstatus: window.localStorage.getItem('worksheetstatus'),
            stopwatch: stopwatch,
            notes: window.localStorage.getItem('notes'),
            client: window.localStorage.getItem('clientid'),
            expenses: window.localStorage.getItem('expenses'),
            id : window.localStorage.getItem('id'),
            date : window.localStorage.getItem('date'),
            material : window.localStorage.getItem('material')
        };
        
        if(window.localStorage.getItem('addCompany')){
            worksheet["addCompany"] = window.localStorage.getItem('addCompany');
        }
        
        var worksheet = JSON.stringify(worksheet);
        
        window.localStorage.setItem(window.localStorage.getItem('id'), worksheet);
        
        this.flushAll();
        
    },
    
    unwrap: function(id){
        
        var worksheet = window.localStorage.getItem(id);
        var worksheet = JSON.parse(worksheet);
        
        if(typeof worksheet['stopwatch'] === "undefined"){
            var stopwatch = null;
        }else{
            var stopwatch = JSON.stringify(worksheet['stopwatch']);
        }
        
        if(typeof worksheet['notes'] === "undefined"){
            var notes = null;
        }else{
            var notes = worksheet['notes'];
        }
        
        if(typeof worksheet['client'] === "undefined"){
            var client = null;
        }else{
            var client = worksheet['client'];
        }
        
        if(typeof worksheet['addCompany'] === "undefined"){
            
        }else{
            window.localStorage.setItem('addCompany', worksheet['addCompany']);
        }
        
        if(typeof worksheet['date'] === "undefined"){
            
        }else{
            window.localStorage.setItem('date', worksheet['date']);
        }
        
        if(typeof worksheet['material'] === "undefined"){
            var material = null;
        }else{
            var material = worksheet['material'];
        }
        
        //var stopwatch = JSON.stringify(worksheet['stopwatch']);
        
        window.localStorage.setItem('worksheetstatus', worksheet['worksheetstatus']);
        window.localStorage.setItem('stopwatch', stopwatch);
        window.localStorage.setItem('notes', notes);
        window.localStorage.setItem('clientid', client);
        window.localStorage.setItem('expenses', worksheet['expenses']);
        window.localStorage.setItem('id', id);
        window.localStorage.setItem('material', material);
        
        window.location.assign('worksheet.html');
        
        
    }
};