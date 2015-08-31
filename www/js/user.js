var user = {
    // constructor
    initialize: function() {
        // Check if logged in through localStorage
        if (window.localStorage.getItem('username') == null) {
            this.flush();
            window.location.assign('login.html');
        } else {
            // allow
        }
        /*
         * test hardcoded functionality here
         * ## example
         * this.login("username", "password");
         */
    },
    login: function(username, password) {
        // send data to login-handler (ONLINE)
        $.post('http://localhost/inventOnline/login.php', {username: username, password: password},
        //$.post('172.19.93.162/inventOnline/login.php', {username: username, password: password},
        function(data) {
            // create json object
            var json = JSON.parse(data);

            if (json.error) {
                alert(json.error);
            } else {

                // store session variables
                window.localStorage.setItem('username', json.user_name);
                window.localStorage.setItem('useremail', json.user_email);
                window.localStorage.setItem('userid', json.user_id);

                // redirect to main page
                window.location.assign('index.html');
            }
        });
    },
    isLoggedIn: function(){
        if(window.localStorage.getItem('username') !== null){
            window.location.assign('index.html');
        }
    },
    flush: function() {
        // flush all localStorage data
        window.localStorage.removeItem('username');
        window.localStorage.removeItem('useremail');
        window.localStorage.removeItem('userid');
    },
    getWorksheets: function(){
        
    }
};