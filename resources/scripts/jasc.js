$(document).ready(function(){
    
    function CommentToAdd(){
        var self = this;
        self.username = $('#anvnamn').text();
        self.newComment = ko.observable("");
        self.submitComment = function(){
            if (self.newcomment !== ""){
                $.post("directinput.php", "newComment=" + ko.toJS(self.newComment));
                self.newComment("");
            }
        };
    }
    
    function Comments(commentToAdd){
        var self = this;
        self.commentToAdd = commentToAdd;
        self.commentsMade = ko.observableArray();
        
        self.getNewComments = function(no){
            $.getJSON("getComments.php", "noOfComments=" + no, function (jsonComments){
                self.commentsMade.removeAll();
                if(jsonComments !== null && jsonComments !== undefined){
                    for (var i = 0; i < jsonComments.length; i++){
                        var comment = jsonComments[i];
                        comment.username = removeQuotes(comment.username);

                        comment.commenttext = removeQuotes(comment.commenttext);

                        comment.dateAndTime = removeQuotes(comment.dateAndTime);

                        comment.timestamp = removeQuotes(comment.timestamp);

                        comment.displayDelete = comment.username === self.commentToAdd.username;
                        self.commentsMade.push(comment);
                    }
                    self.getNewComments(self.commentsMade().length);
                } else {self.getNewComments(0);}
            });
        };
        
        self.deleteComment = function(comment) {
            self.commentsMade.remove(comment);
            $.post("directinput.php", "timestamp=" + ko.toJS(comment.timestamp));
        };
        
        self.getNewComments(-1);
    }
    
    function removeQuotes(str) {
        return str.replace(/\"/g, "");
    }
    
    var commentToAdd = new CommentToAdd();
    ko.applyBindings(commentToAdd, document.getElementById('commentformdiv'));
    ko.applyBindings(new Comments(commentToAdd), document.getElementById('comments'));
})