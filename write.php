<form method="get" action="" class="singup">
    <h1>Write post</h1>
    <input name="title" type="text" id="name" class="user-write" placeholder="Write a title of article"/>
    <textarea name="editor1" id="editor1" rows="10" cols="80">
        This is my textarea to be replaced with CKEditor.
    </textarea>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
    <input name="tags" type="text" id="name" class="user-write" placeholder="Add tags..."/>

    <input name="Submit" type="button" value="Submit" class="buttons"/>
</form>