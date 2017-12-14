<p>You can submit a comment with the form below as user: <span id="anvnamn"><?php echo $contr->getUser();?></span></p>
<br>
    <textarea id="commentform" rows = 6
        data-bind="textInput: newComment"
        placeholder="Feel free to write your comment here...">
    </textarea>
<button data-bind="click: submitComment">Submit Comment</button>
