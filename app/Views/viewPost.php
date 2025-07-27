<?php
helper('date');

?>
<div class="columns is-centered">
    <div class="column is-2 sidebar has-text-left">
        <a href="<?= base_url() ?>" class="button is-white is-boxed has-text-left is-large">
            <span class="icon is-medium">
                <i class="fas fa-home"></i>
            </span>
            <span>Home</span>
        </a>
        <button class="button is-white is-boxed has-text-left is-large">
            <span class="icon is-medium">
                <i class="fas fa-bell"></i>
            </span>
            <span>Notifications</span>
        </button>
        <button class="button is-white is-boxed has-text-left is-large">
            <span class="icon is-medium">
                <i class="fas fa-user"></i>
            </span>
            <span>Profile</span>
        </button>
    </div>
    <div class="column is-narrow">
        <div class="vertical-line"></div>
    </div>
    <div class="column is-8 main-content">
        <section class="hero is-small">
            <div class="hero-body">
                <p class="title"><?= $book_author['book_title'] ?></p>
                <p class="subtitle">Written By: <?= $book_author_name['author_name'] ?>, Published <?= $pub_date ?></p>
                <p class="subtitle">Reviewed By: <?= $review_author['user_full_name'] ?>, Reviewed <?= $review_date ?>
                </p>
            </div>
        </section>
        <section class="section">
            <h2 class="title"><?= $review['book_review_title'] ?></h2>
            <br />
            <h3 class="subtitle">
                <?= esc($review['book_review_content']) ?>
            </h3>
        </section>
        <nav class="level">
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Completed?</p>
                    <p class="title"><?= $review['complete_or_dnf'] ?></p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading"># of Pages</p>
                    <p class="title"><?= $book_author['number_of_pages'] ?></p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Rating Given</p>
                    <p class="title"><?= $review['book_review_score'] ?></p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Reviewed</p>
                    <p class="title"><?= esc($review_date) ?></p>
                </div>
            </div>
        </nav>
        <section class="section">
            <h1 class="title has-text-centered">Comments</h1>
            <h2 class="subtitle has-text-centered">
                Share your thoughts, but don't be a dick!
            </h2>
        </section>
        <?php foreach($comments as $comment) : ?>
            <?php
                //format the date
                $comment['created'] = date("M d, Y");
                //get comment author name
                $comment_author_id = $comment['author'];
                $comment_author = $comment_authors[$comment_author_id] ?? null;
            ?>
        <div class="card">
            <div class="card-content">
                <div class="content">
                    <?= $comment['comment_content'] ?>
                </div>
            </div>
            <footer class="card-footer">
                <span class="card-footer-item"><?= $comment_author ?></span>
                <span class="card-footer-item"><?= $comment['created'] ?></span>
            </footer>
        </div>
        <?php endforeach ; ?>
    </div>
    <div class="column is-narrow">
        <div class="vertical-line"></div>
    </div>
    <div class="column is-2 sidebar">
        <h2>Right side bar</h2>
    </div>
</div>