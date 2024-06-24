<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Theme
 */

get_header();
?>

    <main id="primary" class="site-main error-page">
        <div class="container block-margin">
            <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                <?php if (function_exists('bcn_display')) {
                    bcn_display();
                } ?>
            </div>

            <div class="error-page__wrapper">
                <h1 class="error-page__title">
                    404
                </h1>

                <div class="error-page__content">
                    <h3>Произошла ошибка</h3>

                    <div class="p2">
                        Данная страница находится в разработке или её не существует.
                        <br>
                        Пожалуйста, вернитесь на главную
                    </div>

                    <a href="/" class="btn">Вернуться на главную</a>
                </div>
            </div>
        </div>

    </main><!-- #main -->

<?php
get_footer();