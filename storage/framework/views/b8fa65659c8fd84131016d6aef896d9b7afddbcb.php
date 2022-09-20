<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<url>
<loc>https://www.larastore.ml/</loc>
<lastmod>2021-06-23T07:47:12+00:00</lastmod>
<priority>1.00</priority>
</url>

<url>
<loc>https://www.larastore.ml/user/signup</loc>
<lastmod>2021-06-23T07:47:12+00:00</lastmod>
<priority>0.80</priority>
</url>

<url>
<loc>https://www.larastore.ml/user/login</loc>
<lastmod>2021-06-23T07:47:12+00:00</lastmod>
<priority>0.80</priority>
</url>

<url>
<loc>https://www.larastore.ml/products</loc>
<lastmod>2021-06-23T07:47:12+00:00</lastmod>
<priority>0.80</priority>
</url>


    <?php $__currentLoopData = $getAllBlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <url>
            <loc><?php echo e(url($post->blog_slug)); ?></loc>
            <lastmod><?php echo e(gmdate('Y-m-d\TH:i:s\Z',strtotime($post->updated_at))); ?></lastmod>
            <changefreq>daily</changefreq>
            <priority>0.6</priority>
        </url>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</urlset><?php /**PATH /home/u980489449/domains/happiness.gifts/public_html/resources/views/user/sitemap.blade.php ENDPATH**/ ?>