<div class="section">
<h2 id="symfony-coding-standards-in-detail"><a class="headerlink" href="#symfony-coding-standards-in-detail" title="Permalink to this headline">Symfony Coding Standards in Detail</a></h2>
<p>If you want to learn about the Symfony coding standards in detail, here's a
short example containing most features described below:</p>
<div translate="no" data-loc="92" class="notranslate codeblock codeblock-length-md codeblock-php"><button class="btn-codeblock-copy-code">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 7m0 2.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667z"></path><path d="M4.012 16.737a2.005 2.005 0 0 1 -1.012 -1.737v-10c0 -1.1 .9 -2 2 -2h10c.75 0 1.158 .385 1.5 1"></path></svg>
            </button>
        <div class="codeblock-scroll">
        <pre class="codeblock-lines">
</pre>
        <pre class="codeblock-code"><code><span class="hljs-comment">/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier &lt;fabien<span class="hljs-doctag">@symfony</span>.com&gt;
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */</span>

<span class="hljs-keyword">namespace</span> <span class="hljs-title">Acme</span>;

<span class="hljs-keyword">use</span> <span class="hljs-title">Other</span>\<span class="hljs-title">Qux</span>;

<span class="hljs-comment">/**

* Coding standards demonstration.
  */</span>
  <span class="hljs-class"><span class="hljs-keyword">class</span> <span class="hljs-title">FooBar</span>
  </span>{
  <span class="hljs-keyword">public</span> <span class="hljs-keyword">const</span>
  SOME_CONST = <span class="hljs-number">42</span>;

  <span class="hljs-keyword">private</span> <span class="hljs-keyword">
  string</span> <span class="hljs-variable"><span class="hljs-variable-other-marker">$</span>fooBar</span>;

  <span class="hljs-comment">/**
    * <span class="hljs-doctag">@param</span> $dummy some argument description
      */</span>
      <span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">
      function</span> <span class="hljs-title">__construct</span><span class="hljs-params">(
      <span class="hljs-keyword">
      string</span> <span class="hljs-variable"><span class="hljs-variable-other-marker">$</span>dummy</span>,
      <span class="hljs-keyword">private</span>
      Qux <span class="hljs-variable"><span class="hljs-variable-other-marker">$</span>qux</span>,
      )</span> </span>{
      <span class="hljs-variable"><span class="hljs-variable-other-marker">$</span>this</span>
      -&gt;fooBar = <span class="hljs-variable"><span class="hljs-variable-other-marker">$</span>this</span>
      -&gt;<span class="hljs-title invoke__">
      transformText</span>(<span class="hljs-variable"><span class="hljs-variable-other-marker">$</span>dummy</span>);
      }

  <span class="hljs-comment">/**
    * <span class="hljs-doctag">@deprecated</span>
      */</span>
      <span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">
      function</span> <span class="hljs-title">
      someDeprecatedMethod</span><span class="hljs-params">()</span>: <span class="hljs-title">string</span>
      </span>{
      <span class="hljs-title invoke__">trigger_deprecation</span>(<span class="hljs-string">'
      symfony/package-name'</span>, <span class="hljs-string">'5.1'</span>, <span class="hljs-string">'The %s() method
      is deprecated, use Acme\Baz::someMethod() instead.'</span>, <span class="hljs-keyword">__METHOD__</span>);

      <span class="hljs-keyword">return</span> Baz::<span class="hljs-title invoke__">someMethod</span>();
      }

  <span class="hljs-comment">/**
    * Transforms the input given as the first argument.
    *
    * <span class="hljs-doctag">@param</span> $options an options collection to be used within the transformation
    *
    * <span class="hljs-doctag">@throws</span> \RuntimeException when an invalid option is provided
      */</span>
      <span class="hljs-keyword">private</span> <span class="hljs-function"><span class="hljs-keyword">
      function</span> <span class="hljs-title">
      transformText</span><span class="hljs-params">(<span class="hljs-keyword">bool</span>|<span class="hljs-keyword">
      string</span> <span class="hljs-variable"><span class="hljs-variable-other-marker">$</span>
      dummy</span>, <span class="hljs-keyword">
      array</span> <span class="hljs-variable"><span class="hljs-variable-other-marker">$</span>
      options</span> = [])</span>: ?<span class="hljs-title">string</span>
      </span>{
      <span class="hljs-variable"><span class="hljs-variable-other-marker">$</span>defaultOptions</span> = [
      <span class="hljs-string">'some_default'</span> =&gt; <span class="hljs-string">'values'</span>,
      <span class="hljs-string">'another_default'</span> =&gt; <span class="hljs-string">'more values'</span>,
      ];

      <span class="hljs-keyword">
      foreach</span> (<span class="hljs-variable"><span class="hljs-variable-other-marker">$</span>
      options</span> <span class="hljs-keyword">
      as</span> <span class="hljs-variable"><span class="hljs-variable-other-marker">$</span>name</span>
      =&gt; <span class="hljs-variable"><span class="hljs-variable-other-marker">$</span>value</span>) {
      <span class="hljs-keyword">if</span> (!<span class="hljs-title invoke__">
      array_key_exists</span>(<span class="hljs-variable"><span class="hljs-variable-other-marker">$</span>
      name</span>, <span class="hljs-variable"><span class="hljs-variable-other-marker">$</span>
      defaultOptions</span>)) {
      <span class="hljs-keyword">throw</span> <span class="hljs-keyword">new</span> \<span class="hljs-title invoke__">
      RuntimeException</span>(<span class="hljs-title invoke__">sprintf</span>(<span class="hljs-string">'Unrecognized
      option "%s"'</span>, <span class="hljs-variable"><span class="hljs-variable-other-marker">$</span>name</span>));
      }
      }

      <span class="hljs-variable"><span class="hljs-variable-other-marker">$</span>
      mergedOptions</span> = <span class="hljs-title invoke__">
      array_merge</span>(<span class="hljs-variable"><span class="hljs-variable-other-marker">$</span>
      defaultOptions</span>, <span class="hljs-variable"><span class="hljs-variable-other-marker">$</span>
      options</span>);

      <span class="hljs-keyword">if</span> (<span class="hljs-keyword">
      true</span> === <span class="hljs-variable"><span class="hljs-variable-other-marker">$</span>dummy</span>) {
      <span class="hljs-keyword">return</span> <span class="hljs-string">'something'</span>;
      }

      <span class="hljs-keyword">if</span> (\<span class="hljs-title invoke__">
      is_string</span>(<span class="hljs-variable"><span class="hljs-variable-other-marker">$</span>dummy</span>)) {
      <span class="hljs-keyword">if</span> (<span class="hljs-string">'
      values'</span> === <span class="hljs-variable"><span class="hljs-variable-other-marker">$</span>
      mergedOptions</span>[<span class="hljs-string">'some_default'</span>]) {
      <span class="hljs-keyword">return</span> <span class="hljs-title invoke__">
      substr</span>(<span class="hljs-variable"><span class="hljs-variable-other-marker">$</span>
      dummy</span>, <span class="hljs-number">0</span>, <span class="hljs-number">5</span>);
      }

           <span class="hljs-keyword">return</span> <span class="hljs-title invoke__">ucwords</span>(<span class="hljs-variable"><span class="hljs-variable-other-marker">$</span>dummy</span>);
      }

      <span class="hljs-keyword">return</span> <span class="hljs-keyword">null</span>;
      }

  <span class="hljs-comment">/**
    * Performs some basic operations for a given value.
      */</span>
      <span class="hljs-keyword">private</span> <span class="hljs-function"><span class="hljs-keyword">
      function</span> <span class="hljs-title">
      performOperations</span><span class="hljs-params">(<span class="hljs-keyword">
      mixed</span> <span class="hljs-variable"><span class="hljs-variable-other-marker">$</span>
      value</span> = <span class="hljs-keyword">null</span>, <span class="hljs-keyword">
      bool</span> <span class="hljs-variable"><span class="hljs-variable-other-marker">$</span>
      theSwitch</span> = <span class="hljs-keyword">false</span>)</span>: <span class="hljs-title">void</span>
      </span>{
      <span class="hljs-keyword">
      if</span> (!<span class="hljs-variable"><span class="hljs-variable-other-marker">$</span>theSwitch</span>) {
      <span class="hljs-keyword">return</span>;
      }

      <span class="hljs-variable"><span class="hljs-variable-other-marker">$</span>this</span>
      -&gt;qux-&gt;<span class="hljs-title invoke__">
      doFoo</span>(<span class="hljs-variable"><span class="hljs-variable-other-marker">$</span>value</span>);
      <span class="hljs-variable"><span class="hljs-variable-other-marker">$</span>this</span>
      -&gt;qux-&gt;<span class="hljs-title invoke__">
      doBar</span>(<span class="hljs-variable"><span class="hljs-variable-other-marker">$</span>value</span>);
      }
      }</code></pre>
   </div>

</div>
<div class="section">
<h3 id="structure"><a class="headerlink" href="#structure" title="Permalink to this headline">Structure</a></h3>
<ul>
    <li>Add a single space after each comma delimiter;</li>
<li>Add a single space around binary operators (<code translate="no" class="notranslate">==</code>, <code translate="no" class="notranslate">&amp;&amp;</code>, ...), with
the exception of the concatenation (<code translate="no" class="notranslate">.</code>) operator;</li>
<li>Place unary operators (<code translate="no" class="notranslate">!</code>, <code translate="no" class="notranslate">--</code>, ...) adjacent to the affected variable;</li>
<li>Always use <a href="https://www.php.net/manual/en/language.operators.comparison.php" class="reference external" rel="external noopener noreferrer" target="_blank">identical comparison</a> unless you need type juggling;</li>
<li>Use <a href="https://en.wikipedia.org/wiki/Yoda_conditions" class="reference external" rel="external noopener noreferrer" target="_blank">Yoda conditions</a> when checking a variable against an expression to avoid
an accidental assignment inside the condition statement (this applies to <code translate="no" class="notranslate">==</code>,
<code translate="no" class="notranslate">!=</code>, <code translate="no" class="notranslate">===</code>, and <code translate="no" class="notranslate">!==</code>);</li>
<li>Add a comma after each array item in a multi-line array, even after the
last one;</li>
<li>Add a blank line before <code translate="no" class="notranslate">return</code> statements, unless the return is alone
inside a statement-group (like an <code translate="no" class="notranslate">if</code> statement);</li>
<li>Use <code translate="no" class="notranslate">return null;</code> when a function explicitly returns <code translate="no" class="notranslate">null</code> values and
use <code translate="no" class="notranslate">return;</code> when the function returns <code translate="no" class="notranslate">void</code> values;</li>
<li>Do not add the <code translate="no" class="notranslate">void</code> return type to methods in tests;</li>
<li>Use braces to indicate control structure body regardless of the number of
statements it contains;</li>
<li>Define one class per file - this does not apply to private helper classes
that are not intended to be instantiated from the outside and thus are not
concerned by the <a href="https://www.php-fig.org/psr/psr-0/" class="reference external" rel="external noopener noreferrer" target="_blank">PSR-0</a> and <a href="https://www.php-fig.org/psr/psr-4/" class="reference external" rel="external noopener noreferrer" target="_blank">PSR-4</a> autoload standards;</li>
<li>Declare the class inheritance and all the implemented interfaces on the same
line as the class name;</li>
<li>Declare class properties before methods;</li>
<li>Declare public methods first, then protected ones and finally private ones.
The exceptions to this rule are the class constructor and the <code translate="no" class="notranslate">setUp()</code> and
<code translate="no" class="notranslate">tearDown()</code> methods of PHPUnit tests, which must always be the first methods
to increase readability;</li>
<li>Declare all the arguments on the same line as the method/function name, no
matter how many arguments there are. The only exception are constructor methods
using <a href="https://www.php.net/manual/en/language.oop5.decon.php#language.oop5.decon.constructor.promotion" class="reference external" rel="external noopener noreferrer" target="_blank">constructor property promotion</a>, where each parameter must be on a new
line with <a href="https://wiki.php.net/rfc/trailing_comma_in_parameter_list" class="reference external" rel="external noopener noreferrer" target="_blank">trailing comma</a>;</li>
<li>Use parentheses when instantiating classes regardless of the number of
arguments the constructor has;</li>
<li>Exception and error message strings must be concatenated using <a href="https://secure.php.net/manual/en/function.sprintf.php" class="reference external" title="sprintf" rel="external noopener noreferrer" target="_blank">sprintf</a>;</li>
<li><p>Exception and error messages must not contain backticks,
even when referring to a technical element (such as a method or variable name).
Double quotes must be used at all time:</p>
<div translate="no" data-loc="2" class="notranslate codeblock codeblock-length-sm codeblock-diff">
        <div class="codeblock-scroll">
        <pre class="codeblock-lines">1
2</pre>
        <pre class="codeblock-code"><code><span class="hljs-deletion">- Expected `foo` option to be one of ...</span>
<span class="hljs-addition">+ Expected "foo" option to be one of ...</span></code></pre>
    </div>
</div></li>
<li>Exception and error messages must start with a capital letter and finish with a dot <code translate="no" class="notranslate">.</code>;</li>
<li><p>Exception, error and deprecation messages containing a class name must
use <code translate="no" class="notranslate">get_debug_type()</code> instead of <code translate="no" class="notranslate">::class</code> to retrieve it:</p>
<div translate="no" data-loc="2" class="notranslate codeblock codeblock-length-sm codeblock-diff">
        <div class="codeblock-scroll">
        <pre class="codeblock-lines">1
2</pre>
        <pre class="codeblock-code"><code><span class="hljs-deletion">- throw new \Exception(sprintf('Command "%s" failed.', $command::class));</span>
<span class="hljs-addition">+ throw new \Exception(sprintf('Command "%s" failed.', get_debug_type($command)));</span></code></pre>
    </div>
</div></li>
<li>Do not use <code translate="no" class="notranslate">else</code>, <code translate="no" class="notranslate">elseif</code>, <code translate="no" class="notranslate">break</code> after <code translate="no" class="notranslate">if</code> and <code translate="no" class="notranslate">case</code> conditions
which return or throw something;</li>
<li>Do not use spaces around <code translate="no" class="notranslate">[</code> offset accessor and before <code translate="no" class="notranslate">]</code> offset accessor;</li>
<li>Add a <code translate="no" class="notranslate">use</code> statement for every class that is not part of the global namespace;</li>
<li>When PHPDoc tags like <code translate="no" class="notranslate">@param</code> or <code translate="no" class="notranslate">@return</code> include <code translate="no" class="notranslate">null</code> and other
types, always place <code translate="no" class="notranslate">null</code> at the end of the list of types.</li>
</ul>
</div>
<div class="section">
<h3 id="naming-conventions"><a class="headerlink" href="#naming-conventions" title="Permalink to this headline">Naming Conventions</a></h3>
<ul>
    <li>Use <a href="https://en.wikipedia.org/wiki/Camel_case" class="reference external" rel="external noopener noreferrer" target="_blank">camelCase</a> for PHP variables, function and method names, arguments
(e.g. <code translate="no" class="notranslate">$acceptableContentTypes</code>, <code translate="no" class="notranslate">hasSession()</code>);</li>
</ul>
<dl>
                        <dt>Use <a href="https://en.wikipedia.org/wiki/Snake_case" class="reference external" rel="external noopener noreferrer" target="_blank">snake_case</a> for configuration parameters, route names and Twig template</dt>

        <dd>
                            variables (e.g. <code translate="no" class="notranslate">framework.csrf_protection</code>, <code translate="no" class="notranslate">http_status_code</code>);
                    </dd>
    </dl>

<ul>
    <li>Use SCREAMING_SNAKE_CASE for constants (e.g. <code translate="no" class="notranslate">InputArgument::IS_ARRAY</code>);</li>
<li>Use <a href="https://en.wikipedia.org/wiki/Camel_case" class="reference external" rel="external noopener noreferrer" target="_blank">UpperCamelCase</a> for enumeration cases (e.g. <code translate="no" class="notranslate">InputArgumentMode::IsArray</code>);</li>
<li>Use namespaces for all PHP classes, interfaces, traits and enums and
<a href="https://en.wikipedia.org/wiki/Camel_case" class="reference external" rel="external noopener noreferrer" target="_blank">UpperCamelCase</a> for their names (e.g. <code translate="no" class="notranslate">ConsoleLogger</code>);</li>
<li>Prefix all abstract classes with <code translate="no" class="notranslate">Abstract</code> except PHPUnit <code translate="no" class="notranslate">*TestCase</code>.
Please note some early Symfony classes do not follow this convention and
have not been renamed for backward compatibility reasons. However, all new
abstract classes must follow this naming convention;</li>
<li>Suffix interfaces with <code translate="no" class="notranslate">Interface</code>;</li>
<li>Suffix traits with <code translate="no" class="notranslate">Trait</code>;</li>
<li>Don't use a dedicated suffix for classes or enumerations (e.g. like <code translate="no" class="notranslate">Class</code>
or <code translate="no" class="notranslate">Enum</code>), except for the cases listed below.</li>
<li>Suffix exceptions with <code translate="no" class="notranslate">Exception</code>;</li>
<li>Prefix PHP attributes that relate to service configuration with <code translate="no" class="notranslate">As</code>
(e.g. <code translate="no" class="notranslate">#[AsCommand]</code>, <code translate="no" class="notranslate">#[AsEventListener]</code>, etc.);</li>
<li>Prefix PHP attributes that relate to controller arguments with <code translate="no" class="notranslate">Map</code>
(e.g. <code translate="no" class="notranslate">#[MapEntity]</code>, <code translate="no" class="notranslate">#[MapCurrentUser]</code>, etc.);</li>
<li>Use UpperCamelCase for naming PHP files (e.g. <code translate="no" class="notranslate">EnvVarProcessor.php</code>) and
snake case for naming Twig templates and web assets (<code translate="no" class="notranslate">section_layout.html.twig</code>,
<code translate="no" class="notranslate">index.scss</code>);</li>
<li>For type-hinting in PHPDocs and casting, use <code translate="no" class="notranslate">bool</code> (instead of <code translate="no" class="notranslate">boolean</code>
or <code translate="no" class="notranslate">Boolean</code>), <code translate="no" class="notranslate">int</code> (instead of <code translate="no" class="notranslate">integer</code>), <code translate="no" class="notranslate">float</code> (instead of
<code translate="no" class="notranslate">double</code> or <code translate="no" class="notranslate">real</code>);</li>
<li>Don't forget to look at the more verbose <a href="conventions.html" class="reference internal">Conventions</a> document for
more subjective naming considerations.</li>
</ul>
<span id="service-naming-conventions"></span>
</div>
<div class="section">
<h3 id="service-naming-conventions"><a class="headerlink" href="#service-naming-conventions" title="Permalink to this headline">Service Naming Conventions</a></h3>
<ul>
    <li>A service name must be the same as the fully qualified class name (FQCN) of
its class (e.g. <code translate="no" class="notranslate">App\EventSubscriber\UserSubscriber</code>);</li>
<li>If there are multiple services for the same class, use the FQCN for the main
service and use lowercase and underscored names for the rest of services.
Optionally divide them in groups separated with dots (e.g.
<code translate="no" class="notranslate">something.service_name</code>, <code translate="no" class="notranslate">fos_user.something.service_name</code>);</li>
<li>Use lowercase letters for parameter names (except when referring
to environment variables with the <code translate="no" class="notranslate">%env(VARIABLE_NAME)%</code> syntax);</li>
<li>Add class aliases for public services (e.g. alias <code translate="no" class="notranslate">Symfony\Component\Something\ClassName</code>
to <code translate="no" class="notranslate">something.service_name</code>).</li>
</ul>
</div>
<div class="section">
<h3 id="documentation"><a class="headerlink" href="#documentation" title="Permalink to this headline">Documentation</a></h3>
<ul>
    <li>Add PHPDoc blocks for classes, methods, and functions only when they add
relevant information that does not duplicate the name, native type
declaration or context (e.g. <code translate="no" class="notranslate">instanceof</code> checks);</li>
<li><p>Only use annotations and types defined in <a href="https://docs.phpdoc.org/3.0/guide/references/phpdoc/index.html" class="reference external" rel="external noopener noreferrer" target="_blank">the PHPDoc reference</a>. In
order to improve types for static analysis, the following annotations are
also allowed:</p>
<ul>
    <li><a href="https://psalm.dev/docs/annotating_code/templated_annotations/" class="reference external" rel="external noopener noreferrer" target="_blank">Generics</a>, with the exception of <code translate="no" class="notranslate">@template-covariant</code>.</li>
<li><a href="https://psalm.dev/docs/annotating_code/type_syntax/conditional_types/" class="reference external" rel="external noopener noreferrer" target="_blank">Conditional return types</a> using the vendor-prefixed <code translate="no" class="notranslate">@psalm-return</code>;</li>
<li><a href="https://psalm.dev/docs/annotating_code/type_syntax/value_types/#regular-class-constants" class="reference external" rel="external noopener noreferrer" target="_blank">Class constants</a>;</li>
<li><a href="https://psalm.dev/docs/annotating_code/type_syntax/callable_types/" class="reference external" rel="external noopener noreferrer" target="_blank">Callable types</a>;</li>
</ul></li>
<li>Group annotations together so that annotations of the same type immediately
follow each other, and annotations of a different type are separated by a
single blank line;</li>
<li>Omit the <code translate="no" class="notranslate">@return</code> annotation if the method does not return anything;</li>
<li>Don't use one-line PHPDoc blocks on classes, methods and functions, even
when they contain just one annotation (e.g. don't put <code translate="no" class="notranslate">/** {@inheritdoc} */</code>
in a single line);</li>
<li>When adding a new class or when making significant changes to an existing class,
an <code translate="no" class="notranslate">@author</code> tag with personal contact information may be added, or expanded.
Please note it is possible to have the personal contact information updated or
removed per request to the <a href="core_team.html" class="reference internal">core team</a>.</li>
</ul>
</div>
<div class="section">
<h3 id="license"><a class="headerlink" href="#license" title="Permalink to this headline">License</a></h3>
<ul>
    <li>Symfony is released under the MIT license, and the license block has to be
present at the top of every PHP file, before the namespace.</li>
</ul>
</div>
</div>

<div class="section">
<h3 id="structure"><a class="headerlink" href="#structure" title="Permalink to this headline">Structure</a></h3>
<ul>
    <li>Add a single space after each comma delimiter;</li>
<li>Add a single space around binary operators (<code translate="no" class="notranslate">==</code>, <code translate="no" class="notranslate">&amp;&amp;</code>, ...), with
the exception of the concatenation (<code translate="no" class="notranslate">.</code>) operator;</li>
<li>Place unary operators (<code translate="no" class="notranslate">!</code>, <code translate="no" class="notranslate">--</code>, ...) adjacent to the affected variable;</li>
<li>Always use <a href="https://www.php.net/manual/en/language.operators.comparison.php" class="reference external" rel="external noopener noreferrer" target="_blank">identical comparison</a> unless you need type juggling;</li>
<li>Use <a href="https://en.wikipedia.org/wiki/Yoda_conditions" class="reference external" rel="external noopener noreferrer" target="_blank">Yoda conditions</a> when checking a variable against an expression to avoid
an accidental assignment inside the condition statement (this applies to <code translate="no" class="notranslate">==</code>,
<code translate="no" class="notranslate">!=</code>, <code translate="no" class="notranslate">===</code>, and <code translate="no" class="notranslate">!==</code>);</li>
<li>Add a comma after each array item in a multi-line array, even after the
last one;</li>
<li>Add a blank line before <code translate="no" class="notranslate">return</code> statements, unless the return is alone
inside a statement-group (like an <code translate="no" class="notranslate">if</code> statement);</li>
<li>Use <code translate="no" class="notranslate">return null;</code> when a function explicitly returns <code translate="no" class="notranslate">null</code> values and
use <code translate="no" class="notranslate">return;</code> when the function returns <code translate="no" class="notranslate">void</code> values;</li>
<li>Do not add the <code translate="no" class="notranslate">void</code> return type to methods in tests;</li>
<li>Use braces to indicate control structure body regardless of the number of
statements it contains;</li>
<li>Define one class per file - this does not apply to private helper classes
that are not intended to be instantiated from the outside and thus are not
concerned by the <a href="https://www.php-fig.org/psr/psr-0/" class="reference external" rel="external noopener noreferrer" target="_blank">PSR-0</a> and <a href="https://www.php-fig.org/psr/psr-4/" class="reference external" rel="external noopener noreferrer" target="_blank">PSR-4</a> autoload standards;</li>
<li>Declare the class inheritance and all the implemented interfaces on the same
line as the class name;</li>
<li>Declare class properties before methods;</li>
<li>Declare public methods first, then protected ones and finally private ones.
The exceptions to this rule are the class constructor and the <code translate="no" class="notranslate">setUp()</code> and
<code translate="no" class="notranslate">tearDown()</code> methods of PHPUnit tests, which must always be the first methods
to increase readability;</li>
<li>Declare all the arguments on the same line as the method/function name, no
matter how many arguments there are. The only exception are constructor methods
using <a href="https://www.php.net/manual/en/language.oop5.decon.php#language.oop5.decon.constructor.promotion" class="reference external" rel="external noopener noreferrer" target="_blank">constructor property promotion</a>, where each parameter must be on a new
line with <a href="https://wiki.php.net/rfc/trailing_comma_in_parameter_list" class="reference external" rel="external noopener noreferrer" target="_blank">trailing comma</a>;</li>
<li>Use parentheses when instantiating classes regardless of the number of
arguments the constructor has;</li>
<li>Exception and error message strings must be concatenated using <a href="https://secure.php.net/manual/en/function.sprintf.php" class="reference external" title="sprintf" rel="external noopener noreferrer" target="_blank">sprintf</a>;</li>
<li><p>Exception and error messages must not contain backticks,
even when referring to a technical element (such as a method or variable name).
Double quotes must be used at all time:</p>
<div translate="no" data-loc="2" class="notranslate codeblock codeblock-length-sm codeblock-diff">
        <div class="codeblock-scroll">
        <pre class="codeblock-lines">1
2</pre>
        <pre class="codeblock-code"><code><span class="hljs-deletion">- Expected `foo` option to be one of ...</span>
<span class="hljs-addition">+ Expected "foo" option to be one of ...</span></code></pre>
    </div>
</div></li>
<li>Exception and error messages must start with a capital letter and finish with a dot <code translate="no" class="notranslate">.</code>;</li>
<li><p>Exception, error and deprecation messages containing a class name must
use <code translate="no" class="notranslate">get_debug_type()</code> instead of <code translate="no" class="notranslate">::class</code> to retrieve it:</p>
<div translate="no" data-loc="2" class="notranslate codeblock codeblock-length-sm codeblock-diff">
        <div class="codeblock-scroll">
        <pre class="codeblock-lines">1
2</pre>
        <pre class="codeblock-code"><code><span class="hljs-deletion">- throw new \Exception(sprintf('Command "%s" failed.', $command::class));</span>
<span class="hljs-addition">+ throw new \Exception(sprintf('Command "%s" failed.', get_debug_type($command)));</span></code></pre>
    </div>
</div></li>
<li>Do not use <code translate="no" class="notranslate">else</code>, <code translate="no" class="notranslate">elseif</code>, <code translate="no" class="notranslate">break</code> after <code translate="no" class="notranslate">if</code> and <code translate="no" class="notranslate">case</code> conditions
which return or throw something;</li>
<li>Do not use spaces around <code translate="no" class="notranslate">[</code> offset accessor and before <code translate="no" class="notranslate">]</code> offset accessor;</li>
<li>Add a <code translate="no" class="notranslate">use</code> statement for every class that is not part of the global namespace;</li>
<li>When PHPDoc tags like <code translate="no" class="notranslate">@param</code> or <code translate="no" class="notranslate">@return</code> include <code translate="no" class="notranslate">null</code> and other
types, always place <code translate="no" class="notranslate">null</code> at the end of the list of types.</li>
</ul>
</div>

<div class="section">
<h3 id="naming-conventions"><a class="headerlink" href="#naming-conventions" title="Permalink to this headline">Naming Conventions</a></h3>
<ul>
    <li>Use <a href="https://en.wikipedia.org/wiki/Camel_case" class="reference external" rel="external noopener noreferrer" target="_blank">camelCase</a> for PHP variables, function and method names, arguments
(e.g. <code translate="no" class="notranslate">$acceptableContentTypes</code>, <code translate="no" class="notranslate">hasSession()</code>);</li>
</ul>
<dl>
                        <dt>Use <a href="https://en.wikipedia.org/wiki/Snake_case" class="reference external" rel="external noopener noreferrer" target="_blank">snake_case</a> for configuration parameters, route names and Twig template</dt>

        <dd>
                            variables (e.g. <code translate="no" class="notranslate">framework.csrf_protection</code>, <code translate="no" class="notranslate">http_status_code</code>);
                    </dd>
    </dl>

<ul>
    <li>Use SCREAMING_SNAKE_CASE for constants (e.g. <code translate="no" class="notranslate">InputArgument::IS_ARRAY</code>);</li>
<li>Use <a href="https://en.wikipedia.org/wiki/Camel_case" class="reference external" rel="external noopener noreferrer" target="_blank">UpperCamelCase</a> for enumeration cases (e.g. <code translate="no" class="notranslate">InputArgumentMode::IsArray</code>);</li>
<li>Use namespaces for all PHP classes, interfaces, traits and enums and
<a href="https://en.wikipedia.org/wiki/Camel_case" class="reference external" rel="external noopener noreferrer" target="_blank">UpperCamelCase</a> for their names (e.g. <code translate="no" class="notranslate">ConsoleLogger</code>);</li>
<li>Prefix all abstract classes with <code translate="no" class="notranslate">Abstract</code> except PHPUnit <code translate="no" class="notranslate">*TestCase</code>.
Please note some early Symfony classes do not follow this convention and
have not been renamed for backward compatibility reasons. However, all new
abstract classes must follow this naming convention;</li>
<li>Suffix interfaces with <code translate="no" class="notranslate">Interface</code>;</li>
<li>Suffix traits with <code translate="no" class="notranslate">Trait</code>;</li>
<li>Don't use a dedicated suffix for classes or enumerations (e.g. like <code translate="no" class="notranslate">Class</code>
or <code translate="no" class="notranslate">Enum</code>), except for the cases listed below.</li>
<li>Suffix exceptions with <code translate="no" class="notranslate">Exception</code>;</li>
<li>Prefix PHP attributes that relate to service configuration with <code translate="no" class="notranslate">As</code>
(e.g. <code translate="no" class="notranslate">#[AsCommand]</code>, <code translate="no" class="notranslate">#[AsEventListener]</code>, etc.);</li>
<li>Prefix PHP attributes that relate to controller arguments with <code translate="no" class="notranslate">Map</code>
(e.g. <code translate="no" class="notranslate">#[MapEntity]</code>, <code translate="no" class="notranslate">#[MapCurrentUser]</code>, etc.);</li>
<li>Use UpperCamelCase for naming PHP files (e.g. <code translate="no" class="notranslate">EnvVarProcessor.php</code>) and
snake case for naming Twig templates and web assets (<code translate="no" class="notranslate">section_layout.html.twig</code>,
<code translate="no" class="notranslate">index.scss</code>);</li>
<li>For type-hinting in PHPDocs and casting, use <code translate="no" class="notranslate">bool</code> (instead of <code translate="no" class="notranslate">boolean</code>
or <code translate="no" class="notranslate">Boolean</code>), <code translate="no" class="notranslate">int</code> (instead of <code translate="no" class="notranslate">integer</code>), <code translate="no" class="notranslate">float</code> (instead of
<code translate="no" class="notranslate">double</code> or <code translate="no" class="notranslate">real</code>);</li>
<li>Don't forget to look at the more verbose <a href="conventions.html" class="reference internal">Conventions</a> document for
more subjective naming considerations.</li>
</ul>
<span id="service-naming-conventions"></span>
</div>
