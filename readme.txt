=== insert ===
Contributors: ryanve
Donate link: http://gittip.com/ryanve
Tags: insert, shortcode
Requires at least: 2.7.0
Tested up to: 3.8.0
Stable tag: trunk
License: MIT
License URI: http://opensource.org/licenses/MIT

Insert posts, hooks, or templates.

== Description ==

### Usage

Use the `[insert]` shortcode inside posts or anywhere else that processes [shortcodes](http://codex.wordpress.org/Shortcode_API).

#### `[insert]` shortcode attributes

- <b>query</b> - sets up a new [`WP_Query`](http://codex.wordpress.org/Class_Reference/WP_Query) via [`get_posts()`](http://codex.wordpress.org/Template_Tags/get_posts)
- <b>data</b> - data to pass to actions
- <b>action</b> - action to run, runs for each post if applicable
- <b>filter</b> - filter to run, runs for each post if applicable
- <b>template</b> - template to load via [`locate_template()`](http://codex.wordpress.org/Function_Reference/locate_template)

All attributes are optional and can be used in combination to yield powerful abilities.

### Abilities

Possibilities with `[insert]` are endless. Practical uses include:

- Insert posts into posts
- Insert hooks into posts
- Insert posts into widgets
- Run action hooks via widgets
- Load templates via widgets

### Examples

#### Insert a template
```
[insert template="branding.php"]
```

#### Insert an action
```
[insert action="dostuff"]
```

#### Pass data to an action

```
[insert data="field=slug&value=example&tax=category" action="dostuff"]
```

The action receives <var>data</var> as an array.

```
add_action('dostuff', 'print_r');
```

#### Insert a page via template
```
[insert query="name=about&post_type=page" template="entry.php"]
```

#### Insert a page via action

This sets up the query and triggers the action.

```
[insert query="name=about&post_type=page" action="dostuff"]
```

WP template tags are available inside the action.

```
add_action('dostuff', 'the_title');
```

### Github

- [github.com/ryanve/insert](https://github.com/ryanve/insert)


== Installation ==

<b>Requires:</b> PHP 5.3+

1. Upload to the `/wp-content/plugins/` directory
1. Activate through the Plugins menu in WordPress