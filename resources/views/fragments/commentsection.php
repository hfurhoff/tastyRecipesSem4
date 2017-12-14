<div id="commentsection">
    <div id="commentformdiv">
        <?php
        if($loggedIn){
            include 'commentform.php';
        } else {
            echo "<p>You need to login to submit a comment. <a href=\"login.php\">You can do that here</a>";
        }
        ?>
    </div>
        <h3>Comments</h3>
        <div id="comments">
            <div data-bind="visible: commentsMade().length < 1">
                <p>No comments have been made for this recipe yet. Feel free to be the first one!</p>
            </div>
            <!-- ko foreach: {data: commentsMade, as: 'comment'} -->
            <div class="postedcomment">
                <p class="commentauthor">
                    At <span data-bind="text: comment.dateAndTime"></span> <span data-bind="text: comment.username"></span> wrote:
                </p>
                <p class="comment">
                    <p data-bind="text: comment.commenttext"></p>
                </p>
                <!-- ko if: comment.displayDelete -->
                    <button data-bind="click: $parent.deleteComment">
                        Delete comment
                    </button>
                <!-- /ko -->
            </div>
            <!-- /ko -->
        </div>
</div>