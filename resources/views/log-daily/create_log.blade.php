<section class="create-log-wrapper">
    <div class="container">
        <div class="content">
            <div class="top-info">
                <h3 class="text-uppercase text-center">Make your log daily for {{$day}}.</h3>
            </div>
            <form action="" method="post">
                @csrf
                <div class="bottom-info">
                    <div class="input-field">
                        <div class="row">
                            <div class="left-input col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <label for="titleLog"><i class="fab fa-battle-net"></i> Log title here:</label>
                                <input type="text" placeholder="Title" name="title" id="titleLog"/>
                            </div>

                            <div class="right-input col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <label for="privateLog"><i class="fal fa-mask"></i> Private name here:</label>
                                <input type="text" placeholder="Private name" name="private" id="privateLog"/>
                            </div>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <br>
                    <div class="editor-field">
                        <label for="editorLog"><i class="fal fa-file-edit"></i> Write content here:</label>
                        <textarea name="content" id="editorLog"></textarea>
                    </div>
                </div>
                <div class="button-process">
                    <button type="submit" class="btn-log-form"><i class="fal fa-plus-octagon"></i> Create</button>
                    <button type="button" class="btn-log-form"><i class="fal fa-sync-alt"></i> Refresh</button>
                </div>
            </form>
        </div>
    </div>
</section>
