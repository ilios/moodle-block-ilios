_**Deprecation Notice**: This project has been discontinued. If you looking for a way to integrate Ilios with your LMS then please check out the [LTI Dashboard](https://github.com/ilios/lti-dashboard) project instead._

# Ilios Integration Block for Moodle

This block integrates the [Ilios](http://iliosproject.org/) calendar into Moodle.

This module is designed and developed by The University of California, San Francisco.

## Installation

1. Place this folder under the blocks directory of local Moodle
   installation, i.e. `<moodleroot>/blocks/`

2. Rename this folder to 'ilios' if it is called something else,
   i.e. `<moodleroot>/blocks/ilios`

3. Log into Moodle as administrator, and select 'Notifications' in
   Site Administration column.

4. Change any setting necessary and save it.

## Usage

The calendar may be called with an iframe placed in a label within a Moodle
page:

```html
<iframe
	width="1316"
	height="816"
	frameborder="0"
	src="https://your_moodle_base_url/blocks/ilios/calendar.php?iframe_width=100%&iframe_height=800px&moodle_header=yes">
	Ilios Calendar
</iframe>
```
