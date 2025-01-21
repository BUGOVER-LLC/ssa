<table class="table table-striped mb-5">
<thead>
<tr>
<th>What</th>
<th>How</th>
<th>Good</th>
<th>Bad</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>Controller</strong></td>
<td>plural</td>
<td><code>ArticlesController</code></td>
<td><code>ArticleController</code></td>
</tr>
<tr>
<td><strong>Route</strong></td>
<td>plural</td>
<td><code>articles/1</code></td>
<td><code>article/1</code></td>
</tr>
<tr>
<td><strong>Model</strong></td>
<td>singular</td>
<td><code>User</code></td>
<td><code>Users</code></td>
</tr>
<tr>
<td><strong>Table</strong></td>
<td>plural</td>
<td><code>article_comments</code></td>
<td><code>article_comment, articleComments</code></td>
</tr>
<tr>
<td><strong>Pivot table</strong></td>
<td>singular model names</td>
<td><code>article_user</code></td>
<td><code>articles_users</code></td>
</tr>
<tr>
<td><strong>Table column</strong></td>
<td>snake_case without model name</td>
<td><code>meta_title</code></td>
<td><code>MetaTitle, article_meta_title</code></td>
</tr>
<tr>
<td><strong>Foreign key</strong></td>
<td>singular model name with _id suffix</td>
<td><code>article_id</code></td>
<td><code>ArticleId, id_article, articles_id</code></td>
</tr>
<tr>
<td><strong>Primary key</strong></td>
<td>-</td>
<td><code>id</code></td>
<td><code>custom_id</code></td>
</tr>
<tr>
<td><strong>Migration</strong></td>
<td>-</td>
<td><code>2017_01_01_000000_create_articles_table</code></td>
<td><code>2017_01_01_000000_articles</code></td>
</tr>
<tr>
<td><strong>Method</strong></td>
<td>camelCase</td>
<td><code>getAll</code></td>
<td><code>get_all</code></td>
</tr>
<tr>
<td><strong>Function</strong></td>
<td>snake_case</td>
<td><code>abort_if</code></td>
<td><code>abortIf</code></td>
</tr>
<tr>
<td><strong>Method in test class</strong></td>
<td>camelCase</td>
<td><code>testGuestCannotSeeArticle</code></td>
<td><code>test_guest_cannot_see_article</code></td>
</tr>
<tr>
<td><strong>Model property</strong></td>
<td>snake_case</td>
<td><code>$model-&gt;model_property</code></td>
<td><code>$model-&gt;modelProperty</code></td>
</tr>
<tr>
<td><strong>Variable</strong></td>
<td>camelCase</td>
<td><code>$anyOtherVariable</code></td>
<td><code>$any_other_variable</code></td>
</tr>
<tr>
<td><strong>Collection</strong></td>
<td>descriptive, plural</td>
<td><code>$activeUsers = User::active()-&gt;get()</code></td>
<td><code>$active, $data</code></td>
</tr>
<tr>
<td><strong>Object</strong></td>
<td>descriptive, singular</td>
<td><code>$activeUser = User::active()-&gt;first()</code></td>
<td><code>$users, $obj</code></td>
</tr>
<tr>
<td><strong>Config and language files index</strong></td>
<td>snake_case</td>
<td><code>articles_enabled</code></td>
<td><code>ArticlesEnabled, articles-enabled</code></td>
</tr>
<tr>
<td><strong>View file name</strong></td>
<td>kebab-case</td>
<td><code>show-filtered.blade.php</code></td>
<td><code>showFiltered.blade.php, show_filtered.blade.php</code></td>
</tr>
<tr>
<td><strong>Config file name</strong></td>
<td>kebab-case</td>
<td><code>google-calendar.php</code></td>
<td><code>googleCalendar.php, google_calendar.php</code></td>
</tr>
<tr>
<td><strong>Contract (interface)</strong></td>
<td>adjective or noun</td>
<td><code>Authenticatable</code></td>
<td><code>AuthenticationInterface, IAuthentication</code></td>
</tr>
<tr>
<td><strong>Trait</strong></td>
<td>adjective</td>
<td><code>Notifiable</code></td>
<td><code>NotificationTrait</code></td>
</tr>
</tbody>
</table>

<table class="table table-striped mb-5">
<thead>
<tr>
<th>Common syntax</th>
<th>Shorter and more readable syntax</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>Session::get('foo')</code></td>
<td><code>session('foo')</code></td>
</tr>
<tr>
<td><code>$request-&gt;session()-&gt;get('foo')</code></td>
<td><code>session('foo')</code></td>
</tr>
<tr>
<td><code>Session::put('foo', $data)</code></td>
<td><code>session(['foo' =&gt; $data])</code></td>
</tr>
<tr>
<td><code>$request-&gt;input('name'),Request::get('name')</code></td>
<td><code>$request-&gt;name,request('name')</code></td>
</tr>
<tr>
<td><code>return Redirect::back()</code></td>
<td><code>return redirect()-&gt;back()</code></td>
</tr>
<tr>
<td><code>is_null($object-&gt;relation) ? $object-&gt;relation-&gt;id : null;</code></td>
<td><code>optional($object-&gt;relation)-&gt;id</code></td>
</tr>
<tr>
<td><code>return view('index')-&gt;with('title', $title)-&gt;with('client', $client)</code></td>
<td><code>return view('index', compact('title', 'client'))</code></td>
</tr>
<tr>
<td><code>$request-&gt;has('value') ? $request-&gt;value : 'default';</code></td>
<td><code>$request-&gt;get('value','default')</code></td>
</tr>
<tr>
<td><code>Carbon::now(), Carbon::today()</code></td>
<td><code>now(), today()</code></td>
</tr>
<tr>
<td><code>App::make('Class')</code></td>
<td><code>app('Class')</code></td>
</tr>
<tr>
<td><code>-&gt;where('column', '=', 1)</code></td>
<td><code>-&gt;where('column', 1)</code></td>
</tr>
<tr>
<td><code>-&gt;orderBy('created_at', 'desc')</code></td>
<td><code>-&gt;latest()</code></td>
</tr>
<tr>
<td><code>-&gt;orderBy('age', 'desc')</code></td>
<td><code>-&gt;latest('age')</code></td>
</tr>
<tr>
<td><code>-&gt;orderBy('created_at', 'asc')</code></td>
<td><code>-&gt;oldest()</code></td>
</tr>
<tr>
<td><code>-&gt;select('id', 'name')-&gt;get()</code></td>
<td><code>-&gt;get(['id', 'name'])</code></td>
</tr>
<tr>
<td><code>-&gt;first()-&gt;name</code></td>
<td><code>-&gt;value('name')</code></td>
</tr>
</tbody>
</table>
