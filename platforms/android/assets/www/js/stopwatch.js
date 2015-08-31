var stopwatch = {
    initialize: function() {

    },
    start: function() {

        var date = getCurrentDate();

        var date = {
            timestamps:
                    {
                        start: date
                    }
        };

        //date.timestamps["stop"] = "test";

        console.log(date);
        //window.localStorage.setItem('stopwatch', date);
    },
    stop: function() {

    },
    pause: function() {

    },
    flush: function() {

    },
    getCurrentDate: function(){
        var date = new Date;
        
        var seconds = date.getSeconds();
        var minutes = date.getMinutes();
        var hour = date.getHours();

        var month = date.getMonth();
        // higher month value, jan = 0 etc.
        month++;
        var day = date.getDate();

        return month + "-" + day + " " + hour + ":" + minutes + ":" + seconds;
    }
}