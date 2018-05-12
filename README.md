# nomention
## Exclude links from sending webmentions

The webmention plugin sends mentions for all links in a post but there may be times when you don’t want a webmention sent, especially when dealing with social properties like micro.blog or Mastodon where a mention may create duplication if your post is going to be POSSE’d over.

This plugin adds a callback function to the "webmention_links" filter hook which checks each link tag in a post for the string `class="nomention` and, if found, prevents a webmention being sent for that link.

If preferred, it could be changed to `rel="nomention` (I prefer using class as it is easier to when writing posts in multimarkdown using {.nomention} after a link.)

As it stands the plugin only handles `<a>` tags but could be extended to other types of links such as images etc. by adding additional conditions to the regex: `(<a[^>]+>|<img[^>]+>|...)`
  
See [this post](https://colinwalker.blog/nomention/) for the original idea.
