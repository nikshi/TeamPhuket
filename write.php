<article>
    <form method="get" action="" id="write-post-form">
        <h1>Write a post</h1>
        <input name="name" type="text" class="write-post-fields" placeholder="Write title of post..."/>
        <textarea name="editor1" id="editor1" rows="10" cols="200"></textarea>
        <input name="name" type="text" class="write-post-fields" placeholder="Write tags here..."/>
        <script>
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace( 'editor1' );
        </script>
        <input name="Submit" type="button" value="Submit" class="buttons"/>
    </form>
</article>
