# Text Extractor Utility for WordPress


## Overview

This plugin takes WordPress content and extracts it to plain text, for use in AI generative tools. The utility is basic, and strips out formatting and tags from all content (block-based and plain).


#### Usage

The plugin adds an additional property in the REST API named `plain-text-content`. It also adds a txt file download utility within the admin, under the `Extract Text` admin menu item.


#### Filters

```extract_text_post($output, $post)```  
Filters the post content being output.
