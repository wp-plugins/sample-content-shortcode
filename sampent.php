<?php
/*
Plugin Name: Sample Content
Plugin URI: http://wp42.com/plugins/sample-content/
Description: Generates sample content with code examples
Version: 0.2
Author: The 42nd Estate
Author URI: http://wp42.com/
License: GPL2
*/

/*  Copyright 2011  The 42nd Estate  (email : admin@the42ndestate.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


/* Sample Content Shortcode */


//Adds a shortcode to display sample content
function sampent_display_sample_content($atts, $content = null){

global $wp_query;

$template_name = get_post_meta( $wp_query->post->ID, '_wp_page_template', true );

//check & fill if blank template, for instance on blog posts
if( $template_name == '' ) { $template_name = 'Default'; }

$template_name = ucwords(str_replace('-', ' ', $template_name));
$template_name = str_replace('.php', '', $template_name);

$path = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));

$fullwidth_image = $path . '600x200.gif';
$normal_image = $path . '200x200.gif';


/* Sample Content HTML Block */

//Displays post type and template name, assuming template name is separated by hyphens
$content = '<p>An example of a '.ucfirst(get_post_type()).' with a <strong>'. $template_name .'</strong> Template.</p>';

//The actual sample content starts here and is appened to the identifier above
$content .= <<<SAMPLECONTENT
Text that appears with a <pre><code>black background and white monospaced font</code></pre> are <a href="">code snippets</a>, use them to replicate a style. This sample content is generated via the shortcode:

<pre><code>&#91;sample-content]</code></pre>

By default the Page title is wrapped in a Header 1 tag. Header 2, 3, and 4 should be used to break up content into sections.

<h2>Six Sizes of Headers</h2>

<h1>An Awesome Title</h1>
<h2>An Awesome Title</h2>
<h3>An Awesome Title</h3>
<h4>An Awesome Title</h4>
<h5>An Awesome Title</h5>
<h6>An Awesome Title</h6>

<h3>How are headers made?</h3>

The html for headers(titles) is:

<pre><code>&lt;h1&gt;An Awesome Title&lt;/h1&gt;</code></pre>

Which renders on screen as:

<h1>An Awesome Title</h1>

Sizes range from 1 to 6.

<h2>2 Paragraphs and a Blockquote</h2>
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin pellentesque, est ut venenatis aliquam, lorem quam porttitor ligula, eget ultrices velit dui sed quam. Praesent vehicula placerat lectus. Nulla pede. Quisque a nulla quis massa pulvinar sagittis. Pellentesque neque massa, mattis vulputate, pellentesque nec, vehicula volutpat, purus. Proin pretium dui et nulla cursus eleifend. Aenean aliquam urna eget urna. Vestibulum euismod elit. Donec eget augue sit amet neque elementum pretium. Proin posuere lacus id lacus. Duis vel justo suscipit neque ornare iaculis.</p>

<p>Ut urna urna, rhoncus eget, vestibulum tempus, venenatis non, nunc. Nunc consequat quam in nulla. Praesent feugiat posuere orci. Sed ac ante. Mauris pellentesque massa vitae ante mattis bibendum. <blockquote><p>Quisque dapibus lectus eu eros. Nulla facilisi. Praesent hendrerit egestas erat. Suspendisse at velit. Quisque mollis feugiat est. Curabitur ut leo. Cras auctor semper augue. Pellentesque leo pede, tempus sed, ornare in, venenatis sed, nisl. Quisque est velit, eleifend vitae, mollis ac, adipiscing at, eros. Mauris velit. Etiam nec lorem. Vestibulum pellentesque ligula a velit. Maecenas felis metus, suscipit et, eleifend vel, accumsan vitae, magna.</p></blockquote>
<pre><code>&lt;blockquote&gt;
Quisque dapibus lectus...eleifend vel, accumsan vitae, magna.
&lt;/blockquote&gt;</code></pre> Phasellus ut justo vel magna congue laoreet.</p>

<h3>A smaller sub-headline</h3>

<p>Sed vel nisl. Vivamus pretium est non mauris. Fusce condimentum. Proin molestie. Vestibulum est. Morbi at metus. Nam nisl nulla, euismod at, vehicula nec, molestie vitae, enim. Donec euismod nulla a metus. Suspendisse venenatis metus dapibus dolor. Quisque euismod libero a est. Aliquam feugiat.</p>

<h3>A horizontal rule (<span class="sidenote">a.k.a. a section divider</span>)</h3>

<hr />

<pre><code>&lt;hr /&gt;</pre></code>

<p>Sed vel nisl. Vivamus pretium est non mauris. Fusce condimentum. Proin molestie. Vestibulum est. Morbi at metus. Nam nisl nulla, euismod at, vehicula nec, molestie vitae, enim. Donec euismod nulla a metus. Suspendisse venenatis metus dapibus dolor. Quisque euismod libero a est. Aliquam feugiat.</p>

<h3>A sidenote ( <span class="sidenote">this text here is a sidenote</span> )</h3>

<pre><code>&lt;h3>A sidenote ( &lt;span class="sidenote">this text here is a sidenote&lt;/span> ) &lt;/h3 &gt;</pre></code>

<h2>Two lists!</h2>

<ol>
<li>Uno</li>
<li>Dos</li>
<li>Tres!</li>
</ol>
<pre><code>&lt;ol&gt;
	&lt;li&gt;Uno&lt;/li&gt;
	&lt;li&gt;Dos&lt;/li&gt;
	&lt;li&gt;Tres!&lt;/li&gt;
&lt;/ol&gt;</code></pre>

<ul>
<li>deals</li>
<li>meals</li>
<li>wheels</li>
</ul>

<pre><code>&lt;ul&gt;
	&lt;li&gt;Uno&lt;/li&gt;
	&lt;li&gt;Dos&lt;/li&gt;
	&lt;li&gt;Tres!&lt;/li&gt;
&lt;/ul&gt;</code></pre>

<h2>A Definition List</h2>

<dl>
<h2>Adam's 'slang' words</h2>
<dt>deals</dt>
<dd>value/currency/objects, in a broad economic sense</dd>
<dt>meals</dt>
<dd>food, subsistence, the necessities.</dd>
<dt>wheels</dt>
<dd>transportation, freedom, movement</dd>
</dl>

<pre><code>&lt;dl&gt;
	&lt;h2&gt;Adam's 'slang' words&lt;/h2&gt;
	&lt;dt&gt;deals&lt;/dt&gt;
		&lt;dd&gt;value/currency/objects, in a broad economic sense&lt;/dd&gt;
	&lt;dt&gt;meals&lt;/dt&gt;
		&lt;dd&gt;food, subsistence, the necessities.&lt;/dd&gt;
	&lt;dt&gt;wheels&lt;/dt&gt;
		&lt;dd&gt;transportation, freedom, movement&lt;/dd&gt;
&lt;/dl&gt;</code></pre>

<h3>A paragraph with a note class</h3>

<p class="note">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin pellentesque, est ut venenatis aliquam, lorem quam porttitor ligula, eget ultrices velit dui sed quam. Praesent vehicula placerat lectus. Nulla pede. Quisque a nulla quis massa pulvinar sagittis. Pellentesque neque massa, mattis vulputate, pellentesque nec, vehicula volutpat, purus. Proin pretium dui et nulla cursus eleifend. Aenean aliquam urna eget urna. Vestibulum euismod elit. Donec eget augue sit amet neque elementum pretium. Proin posuere lacus id lacus. Duis vel justo suscipit neque ornare iaculis.</p>

<h3>A paragraph with a warning class</h3>

<p class="warning">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin pellentesque, est ut venenatis aliquam, lorem quam porttitor ligula, eget ultrices velit dui sed quam. Praesent vehicula placerat lectus. Nulla pede. Quisque a nulla quis massa pulvinar sagittis. Pellentesque neque massa, mattis vulputate, pellentesque nec, vehicula volutpat, purus. Proin pretium dui et nulla cursus eleifend. Aenean aliquam urna eget urna. Vestibulum euismod elit. Donec eget augue sit amet neque elementum pretium. Proin posuere lacus id lacus. Duis vel justo suscipit neque ornare iaculis.</p>

<h3>A paragraph with an alert class</h3>

<p class="alert">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin pellentesque, est ut venenatis aliquam, lorem quam porttitor ligula, eget ultrices velit dui sed quam. Praesent vehicula placerat lectus. Nulla pede. Quisque a nulla quis massa pulvinar sagittis. Pellentesque neque massa, mattis vulputate, pellentesque nec, vehicula volutpat, purus. Proin pretium dui et nulla cursus eleifend. Aenean aliquam urna eget urna. Vestibulum euismod elit. Donec eget augue sit amet neque elementum pretium. Proin posuere lacus id lacus. Duis vel justo suscipit neque ornare iaculis.</p>

<h3>A paragraph with an error class</h3>

<p class="error">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin pellentesque, est ut venenatis aliquam, lorem quam porttitor ligula, eget ultrices velit dui sed quam. Praesent vehicula placerat lectus. Nulla pede. Quisque a nulla quis massa pulvinar sagittis. Pellentesque neque massa, mattis vulputate, pellentesque nec, vehicula volutpat, purus. Proin pretium dui et nulla cursus eleifend. Aenean aliquam urna eget urna. Vestibulum euismod elit. Donec eget augue sit amet neque elementum pretium. Proin posuere lacus id lacus. Duis vel justo suscipit neque ornare iaculis.</p>

<h3>A paragraph with a download class</h3>

<p class="download">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin pellentesque, est ut venenatis aliquam, lorem quam porttitor ligula, eget ultrices velit dui sed quam. Praesent vehicula placerat lectus. Nulla pede. Quisque a nulla quis massa pulvinar sagittis. Pellentesque neque massa, mattis vulputate, pellentesque nec, vehicula volutpat, purus. Proin pretium dui et nulla cursus eleifend. Aenean aliquam urna eget urna. Vestibulum euismod elit. Donec eget augue sit amet neque elementum pretium. Proin posuere lacus id lacus. Duis vel justo suscipit neque ornare iaculis.</p>

<pre><code>&lt;p class="download"&gt;Lorem ipsum etceturum.&lt;/p&gt;</code></pre>


<h3>A div block with a note class and centered list of download links</h3>

<div class="note"><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin pellentesque, est ut venenatis aliquam, lorem quam porttitor ligula.</p>
	<ol class="download center">
		<li><a href="#">eget ultrices</a></li>
		<li><a href="#">sed quam</a></li> 
	 	<li><a href="#">velit dui</a></li>
		<li><a href="#">dui quam</a></li>
	</ol>
</div>

<pre><code>&lt;div class="note"&gt;&lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin pellentesque, est ut venenatis aliquam, lorem quam porttitor ligula.&lt;/p&gt;

	&lt;ol class="download center"&gt;
		&lt;li&gt;&lt;a href="#"&gt;eget ultrices&lt;/a&gt;&lt;/li&gt;
		&lt;li&gt;&lt;a href="#"&gt;sed quam&lt;/a&gt;&lt;/li&gt; 
	 	&lt;li&gt;&lt;a href="#"&gt;velit dui&lt;/a&gt;&lt;/li&gt;
		&lt;li&gt;&lt;a href="#"&gt;dui quam&lt;/a&gt;&lt;/li&gt;
	&lt;/ol&gt;
&lt;/div&gt;</code></pre>

<h3>A download div block with a centered block download link</h3>

<div class="download">
	<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin pellentesque, est ut venenatis aliquam, lorem quam porttitor ligula.</p>

	<a class="download block">Lorem ipsum dolor sit </a>
</div>

<pre><code>&lt;div class="download"&gt;
	&lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin pellentesque, est ut venenatis aliquam, lorem quam porttitor ligula.&lt;/p&gt;

	&lt;a class="download block"&gt;Lorem ipsum dolor sit &lt;/a&gt;
&lt;/div&gt;</code></pre>
 
<hr />

<h3>A download link</h3>

<a class="download">Lorem ipsum dolor sit </a>

<pre><code>&lt;a class="download"&gt;Lorem ipsum dolor sit &lt;/a&gt;</code></pre>


<h3>A download link with a block class</h3>

<a class="download block">Lorem ipsum dolor sit </a>

<pre><code>&lt;a class="download block"&gt;Lorem ipsum dolor sit &lt;/a&gt;</code></pre>

<h3>A table of data</h3>

<table>
	<tr>
		<th>Table Heading A</th>
		<th>Table Heading B</th>
		<th>Table Heading C</th>
	</tr>
	<tr>
		<td>Table Data 1A</td>
		<td>Table Data 1B</td>
		<td>Table Data 1C</td>
	</tr>
	<tr>
		<td>Table Data 2A</td>
		<td>Table Data 2B</td>
		<td>Table Data 2C</td>
	</tr>
	<tr>
		<td>Table Data 3A</td>
		<td>Table Data 3B</td>
		<td>Table Data 3C</td>
	</tr>

</table>

<pre><code>&lt;table&gt;
	&lt;tr&gt;
		&lt;th&gt;Table Heading A&lt;/th&gt;
		&lt;th&gt;Table Heading B&lt;/th&gt;
		&lt;th&gt;Table Heading C&lt;/th&gt;
	&lt;/tr&gt;
	&lt;tr&gt;
		&lt;td&gt;Table Data 1A&lt;/td&gt;
		&lt;td&gt;Table Data 1B&lt;/td&gt;
		&lt;td&gt;Table Data 1C&lt;/td&gt;
	&lt;/tr&gt;
	&lt;tr&gt;
		&lt;td&gt;Table Data 2A&lt;/td&gt;
		&lt;td&gt;Table Data 2B&lt;/td&gt;
		&lt;td&gt;Table Data 2C&lt;/td&gt;
	&lt;/tr&gt;
	&lt;tr&gt;
		&lt;td&gt;Table Data 3A&lt;/td&gt;
		&lt;td&gt;Table Data 3B&lt;/td&gt;
		&lt;td&gt;Table Data 3C&lt;/td&gt;
	&lt;/tr&gt;

&lt;/table&gt;</code></pre>

<h2>A full width image</h2>
<img src="$fullwidth_image" width="600px" height="200px" />

<pre><code>&lt;img src="$fullwidth_image" width="600px" height="200px" /&gt;&lt;</code></pre>

<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin pellentesque, est ut venenatis aliquam, lorem quam porttitor ligula, eget ultrices velit dui sed quam. Praesent vehicula placerat lectus. Nulla pede. Quisque a nulla quis massa pulvinar sagittis. Pellentesque neque massa, mattis vulputate, pellentesque nec, vehicula volutpat, purus. Proin pretium dui et nulla cursus eleifend. Aenean aliquam urna eget urna. Vestibulum euismod elit. Donec eget augue sit amet neque elementum pretium. Proin posuere lacus id lacus. Duis vel justo suscipit neque ornare iaculis.</p>

<h2>An image with no alignment</h2>
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin pellentesque, est ut venenatis aliquam, lorem quam porttitor ligula, eget ultrices velit dui sed quam. Praesent vehicula placerat lectus. Nulla pede. <img src="$normal_image" width="200px" height="200px" />Quisque a nulla quis massa pulvinar sagittis. Pellentesque neque massa, mattis vulputate, pellentesque nec, vehicula volutpat, purus. Proin pretium dui et nulla cursus eleifend. Aenean aliquam urna eget urna. Vestibulum euismod elit. Donec eget augue sit amet neque elementum pretium. Proin posuere lacus id lacus. Duis vel justo suscipit neque ornare iaculis.</p>

<pre><code>&lt;img src="$normal_image" width="200px" height="200px" /&gt;</code></pre>

<h2>An image with left alignment</h2>
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin pellentesque, est ut venenatis aliquam, lorem quam porttitor ligula, eget ultrices velit dui sed quam. Praesent vehicula placerat lectus. Nulla pede. <img class="alignleft" src="$normal_image" width="200px" height="200px" />Quisque a nulla quis massa pulvinar sagittis. Pellentesque neque massa, mattis vulputate, pellentesque nec, vehicula volutpat, purus. Proin pretium dui et nulla cursus eleifend. Aenean aliquam urna eget urna. Vestibulum euismod elit. Donec eget augue sit amet neque elementum pretium. Proin posuere lacus id lacus. Duis vel justo suscipit neque ornare iaculis.</p>

<pre><code>&lt;img class="alignleft" src="$normal_image" width="200px" height="200px" /&gt;</code></pre>

<h2>An image with right alignment</h2>
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin pellentesque, est ut venenatis aliquam, lorem quam porttitor ligula, eget ultrices velit dui sed quam. Praesent vehicula placerat lectus. Nulla pede. <img class="alignright" src="$normal_image" width="200px" height="200px" />Quisque a nulla quis massa pulvinar sagittis. Pellentesque neque massa, mattis vulputate, pellentesque nec, vehicula volutpat, purus. Proin pretium dui et nulla cursus eleifend. Aenean aliquam urna eget urna. Vestibulum euismod elit. Donec eget augue sit amet neque elementum pretium. Proin posuere lacus id lacus. Duis vel justo suscipit neque ornare iaculis.</p>

<pre><code>&lt;img class="alignright" src="$normal_image" width="200px" height="200px" /&gt;</code></pre>

<h2>An image with center alignment</h2>
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin pellentesque, est ut venenatis aliquam, lorem quam porttitor ligula, eget ultrices velit dui sed quam. Praesent vehicula placerat lectus. Nulla pede. <img class="aligncenter" src="$normal_image" width="200px" height="200px" />Quisque a nulla quis massa pulvinar sagittis. Pellentesque neque massa, mattis vulputate, pellentesque nec, vehicula volutpat, purus. Proin pretium dui et nulla cursus eleifend. Aenean aliquam urna eget urna. Vestibulum euismod elit. Donec eget augue sit amet neque elementum pretium. Proin posuere lacus id lacus. Duis vel justo suscipit neque ornare iaculis.</p>

<pre><code>&lt;img class="aligncenter" src="$normal_image" width="200px" height="200px" /&gt;</code></pre>

SAMPLECONTENT;
return $content;
}

add_shortcode("sample-content", "sampent_display_sample_content");