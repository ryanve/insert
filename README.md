# insert
#### WP plugin to insert posts, hooks, or templates via shortcode

## Usage

The plugin works via the `[insert]` shortcode. It can be used inside posts or anywhere else that processes shortcodes. All attributes are optional and can be used in combination. Its simple [implementation](insert.php) provides powerful abilities.

### `[insert]` shortcode attributes

- <b>query</b> - sets up a new `WP_Query` via `get_posts()`
- <b>data</b> - data to pass to actions
- <b>action</b> - action to run, runs for each post if applicable
- <b>filter</b> - filter to run, runs for each post if applicable
- <b>template</b> - template to load via `locate_template()`

## Examples

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

## License 

MIT