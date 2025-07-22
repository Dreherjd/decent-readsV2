<div class="columns is-centered">
    <div class="column is-2 sidebar has-text-left">
        <button class="button is-white is-boxed has-text-left is-large">
            <span class="icon is-medium">
                <i class="fas fa-home"></i>
            </span>
            <span>Home</span>
        </button>
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
        <div class="is-fullwidth">
            <span class="icon is-large has-text-centered">
                <i class="fab fa-twitter"></i>
            </span>
        </div>
        <?php foreach($review_collection as $review): ?>
        <div class="card">
            <header class="card-header">
                <?php 
                    // grab the user id from the current review, use it to find the appropriate person from the authors array
                        $authorId = $review['book_review_user_id'];
                        $author = $review_author[$authorId] ?? null;
                    ?>
                <p class="card-header-title"><?= esc($review['book_review_title']);?> - <?= $author['user_full_name'] ?>
                </p>
            </header>
            <div class="card-content">
                <div class="content">
                    <?= esc($review['book_review_content']); ?>
                    <br />
                    <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                </div>
            </div>
            <footer class="card-footer">
                <a href="#" class="card-footer-item">View More</a>
            </footer>
        </div>
        <?php endforeach;?>

    </div>
    <div class="column is-narrow">
        <div class="vertical-line"></div>
    </div>
    <div class="column is-2 sidebar">
        <h2>Right side bar</h2>
    </div>
</div>