<?php require APP_PATH . "/tpls/header.php"; ?>
<!-- Start container -->
<div class="container">
    <?php
        if (!empty($categories[0]) ) {
            echo "<h1>There are " . count($categories) . " categories.</h1>";
        } else if ( empty($categories) ) {
            echo "<h1>There are no category.</h1>";
        } else {
            echo "<h1>There are one category.</h1>";
        }
    ?>
    <p class="alert alert-info">
        Login to manage the categories <a href="<?= $this->url('users/login'); ?>"></a>
    </p>
    <?php if( ! empty($categories) ) : ?>
        <?php if ( !empty($categories[0])) : ?>
            <?php foreach($categories as $category) : ?>
                <div class="panel panel-default">
                    <div class="panel-heading text-center lead">
                        <a href="<?= $this->url('categories/show/') . $category['id']; ?>"><?= $category['name']; ?> <i class="fa fa-star"></i></a>
                    </div>
                    <div class="panel-body">
                        <?php if (!empty($posts) ) : ?>
                            <?php if( isset($posts[0]) ) : ?>
                                <ul class="nav navbar">
                                    <?php foreach($posts as $post) : ?>
                                        <?php if( $post['category_id'] === $category['id'] ) : ?>
                                            <li>
                                                <a href="<?= $this->url('posts/show/'.str_replace(' ', '-', trim($post['title'])).'-'.$post['id']); ?>"><i class="fa fa-arrow-circle-right"></i> <?= $post['title']; ?></a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else : ?>
                                <?php if( $posts['category_id'] === $category['id'] ) : ?>
                                    <p class="lead">
                                        <a href="<?= $this->url('posts/show/'.str_replace(' ', '-', trim($posts['title'])).'-'.$posts['id']); ?>"><i class="fa fa-arrow-circle-right"></i> <?= $posts['title']; ?></a>
                                    </p>
                                <?php else : ?>
                                    <p class="lead">
                                        this category is empty!
                                    </p>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php else : ?>
                            <p class="lead">This category is empty!</p>
                        <?php endif; ?>
                    </div>
                    <div class="panel-footer">
                        <a class="btn btn-sm btn-danger" href="<?= $this->url('categories/delete/'); ?><?= $category['id']; ?>"><i class="fa fa-trash"></i> Delete category</a>
                        <a class="btn btn-sm btn-info" href="<?= $this->url('categories/edit/'); ?><?= $category['id']; ?>"><i class="fa fa-edit"></i> Edit category</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="panel panel-default">
                <div class="panel-heading text-center lead">
                    <a href="<?= $this->url('posts/show/'); ?><?= str_replace(' ', '-', trim($categories['name']) ); ?>-<?= $categories['id']; ?>"><?= $categories['name']; ?></a>
                </div>
                <div class="panel-body">
                    <p class="lead"><?php //$posts['content'];  ?></p>
                    <?php if( !empty($posts[0]) ) : ?>
                        <ul class="nav navbar">
                            <?php foreach($posts as $post) : ?>
                                <?php if( $post['category_id'] === $categories['id'] ) : ?>
                                    <li>
                                        <a href="<?= $this->url('posts/show/'.str_replace(' ', '-', trim($post['title'])).'-'.$post['id']); ?>"><i class="fa fa-arrow-circle-right"></i> <?= $post['title']; ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    <?php elseif (!empty($posts)) : ?>
                        <?php if ( $posts['category_id'] === $categories['id'] ) : ?>
                            <p>
                                <a href="<?= $this->url('posts/show/'.str_replace(' ', '-', trim($posts['title'])).'-'.$posts['id']); ?>"><i class="fa fa-arrow-circle-right"></i> <?= $posts['title']; ?></a>
                            </p>
                        <?php else: ?>
                            <p class="lead">There are no posts in this category !</p>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="panel-footer">
                    <a class="btn btn-sm btn-danger" href="<?= $this->url('categories/delete/'); ?><?= $categories['id']; ?>"><i class="fa fa-trash"></i> Delete category</a>
                    <a class="btn btn-sm btn-info" href="<?= $this->url('categories/edit/'); ?><?= $categories['id']; ?>"><i class="fa fa-edit"></i> Edit category</a>
                </div>
            </div>
        <?php endif; ?>
        <p>
            <a href="<?= $this->url('categories/add'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add category</a>
        </p>
    <?php else: ?>
        <div class="text-center">
            <p class="alert alert-danger"><i class="fa fa-warning"></i> Oups! There are no categories!</p>
            <a href="<?= $this->url('categories/add'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add category</a>
        </div>
    <?php endif; ?>
</div>
<!-- End container -->

<!-- Javascript files -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script>
    try{Modernizr} catch(e) {document.write('<script src="<?= BASE_URL ?>css/modernizr-2.6.2.min.js"><\/script>')}
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="<?= BASE_URL ?>js/script.js"></script>
</body>
</html>
