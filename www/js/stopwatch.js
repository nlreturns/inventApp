var stopwatch = {
    initialize: function() {

    },
    start: function() {

        var date = this.getCurrentDate();

        var date = {
            timestamps:
                    {
                        start: date
                    },
            pause: "false"
        };

        var date = JSON.stringify(date);
        
        window.localStorage.setItem('stopwatch', date);
        window.localStorage.setItem('pause', "false");
    },
    stop: function() {
        
        this.pushDate("stop");
        
    },
    pause: function() {
        
        // get current pause state
        var pause = window.localStorage.getItem('stopwatch');
        var obj = JSON.parse(pause);
        var pause = obj['pause'];
        
        if(pause === "false"){
            
            // set pause to true
            obj['pause'] = "true";
            
            var obj = JSON.stringify(obj);
            
            window.localStorage.setItem('stopwatch', obj);
            
            var field = this.getPause();
            
            this.pushDate(field);
            
        }else{
            
            // set pause to false
            obj['pause'] = "false";
            
            var obj = JSON.stringify(obj);
            
            window.localStorage.setItem('stopwatch', obj);
            
            var field = this.getPause();
            
            this.pushDate(field);
        }

    },
    flush: function() {
        window.localStorage.removeItem('stopwatch');
        window.localStorage.removeItem('pause');
    },
    getCurrentDate: function(){
        var date = new Date;
        
        var seconds = ("0" + date.getSeconds()).slice(-2);
        var minutes = ("0" + date.getMinutes()).slice(-2);
        var hour = ("0" + date.getHours()).slice(-2);

        var year = date.getFullYear();
        // double digits, +1 because jan = 00
        var month = ("0" + (date.getMonth() + 1)).slice(-2);
        // double digits
        var day = ("0" + date.getDate()).slice(-2);

        return year + "-" + month + "-" + day + " " + hour + ":" + minutes + ":" + seconds;
    },
    pushDate: function(field){
        
        var date = this.getCurrentDate();
        
        var obj = window.localStorage.getItem('stopwatch');
        
        var obj = JSON.parse(obj);
        
        obj.timestamps[field] = date;
        
        var obj = JSON.stringify(obj);
        
        window.localStorage.setItem('stopwatch', obj);
    },
    getPause: function(){
        
        var obj = window.localStorage.getItem('stopwatch');
        var obj = JSON.parse(obj);
        
        var number = Object.keys(obj.timestamps).length;
        
        return "pause" + number;
    }
};