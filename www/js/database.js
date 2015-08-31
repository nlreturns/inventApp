var database = {
    
    initialise : function() {
        var db;
        var shortName = 'localDB';
        var version = '1.0';
        var displayName = 'localDB';
        var maxSize = 65535;
        
        this.onBodyLoad();
    },
    
    errorHandler: function(transaction, error) {
        
        alert('Error: ' + error.message + ' code: ' + error.code);
 
    },
    
    succesCallBack: function() {
        alert("Success");
    },
    
    nullHandler: function(){},
    
    onBodyLoad: function() {
        
        if(!window.openDatabase) {
            alert("Database is not supported");
            return;
        }
        
        db = openDatabase(shortName, version, displayName, maxSize);
        
        db.transaction(function(tx){
            // create table
            tx.executeSql('CREATE TABLE IF NOT EXISTS Worksheet (worksheet_id  \n\
            INTEGER NOT NULL PRIMARY KEY, worksheet_notes varchar(1024), \n\
            worksheet_date date, worksheet_expenses integer(10), CRM varchar(64), \n\
            CRM_date date, worksheet_signature integer(1), client_id integer(10) \n\
            NOT NULL, user_id integer(10) NOT NULL)',
            [],nullHandler,errorHandler);
            
        },errorHandler,succesCallBack);
    },
    
    
}