<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<url>
<loc>https://biztria.com/</loc>
<lastmod>2021-06-23T07:47:12+00:00</lastmod>
<priority>1.00</priority>
</url>

<url>
<loc>https://biztria.com/products</loc>
<lastmod>2021-06-23T07:47:12+00:00</lastmod>
<priority>0.80</priority>
</url>


<url>
<loc>https://biztria.com/blogs</loc>
<lastmod>2021-06-23T07:47:12+00:00</lastmod>
<priority>0.80</priority>
</url>


<url>
<loc>https://biztria.com/user/signup</loc>
<lastmod>2021-06-23T07:47:12+00:00</lastmod>
<priority>0.80</priority>
</url>

<url>
<loc>https://biztria.com/user/login</loc>
<lastmod>2021-06-23T07:47:12+00:00</lastmod>
<priority>0.80</priority>
</url>


@foreach ($getAllProducts as $index)
        <url>
            <loc>{{url($index->slug)}}</loc>
            <lastmod>{{ gmdate('Y-m-d\TH:i:s\Z',strtotime($index->updated_at)) }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach
    @foreach ($getAllBlogs as $post)
        <url>
            <loc>{{url($post->blog_slug)}}</loc>
            <lastmod>{{ gmdate('Y-m-d\TH:i:s\Z',strtotime($post->updated_at)) }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach
</urlset>