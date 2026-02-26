<x-main-layout>
	<section class="bg-gradient-to-b from-white to-gray-50">
		<div class="max-w-6xl mx-auto px-6 py-16">
			<div class="inline-flex items-center gap-2 rounded-full border border-blue-200 bg-blue-50 px-4 py-2 text-sm text-blue-700">
				<span class="font-semibold">NDG Framework</span>
				<span>Docs</span>
			</div>

			<h1 class="text-4xl md:text-5xl font-bold mt-6">
				Build fast, clean PHP apps
			</h1>

			<p class="text-lg text-gray-600 mt-4 max-w-3xl">
				This documentation covers everything currently available in the NDG Framework: routing, controllers,
				views, components, migrations, models, and the CLI workflow.
			</p>

			<div class="mt-8 flex flex-wrap gap-3">
				<a href="#quickstart" class="px-5 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
					Quick Start
				</a>
				<a href="#routing" class="px-5 py-3 border rounded-lg hover:bg-gray-100 transition">
					Routing
				</a>
				<a href="#database" class="px-5 py-3 border rounded-lg hover:bg-gray-100 transition">
					Database
				</a>
			</div>
		</div>
	</section>

	<section class="max-w-6xl mx-auto px-6 -mt-6">
		<div class="grid md:grid-cols-3 gap-6">
			<div class="bg-white rounded-2xl shadow p-6">
				<h3 class="font-semibold text-lg">What you can do</h3>
				<p class="text-gray-600 mt-2">Routing, views, components, models, migrations, and Tailwind UI.</p>
			</div>
			<div class="bg-white rounded-2xl shadow p-6">
				<h3 class="font-semibold text-lg">Fast workflow</h3>
				<p class="text-gray-600 mt-2">Generate views and migrations with the CLI.</p>
			</div>
			<div class="bg-white rounded-2xl shadow p-6">
				<h3 class="font-semibold text-lg">Clean output</h3>
				<p class="text-gray-600 mt-2">Layouts and components keep pages consistent.</p>
			</div>
		</div>
	</section>

	<section class="max-w-6xl mx-auto px-6 py-16">
		<div class="grid lg:grid-cols-4 gap-10">
			<aside class="lg:col-span-1">
				<div class="sticky top-6 bg-white border rounded-2xl p-5">
					<h3 class="font-semibold">On this page</h3>
					<ul class="mt-4 space-y-2 text-sm text-gray-600">
						<li><a class="hover:text-blue-600" href="#quickstart">Quick start</a></li>
						<li><a class="hover:text-blue-600" href="#structure">Project structure</a></li>
						<li><a class="hover:text-blue-600" href="#routing">Routing</a></li>
						<li><a class="hover:text-blue-600" href="#controllers">Controllers</a></li>
						<li><a class="hover:text-blue-600" href="#views">Views and components</a></li>
						<li><a class="hover:text-blue-600" href="#assets">Assets and Tailwind</a></li>
						<li><a class="hover:text-blue-600" href="#database">Database and models</a></li>
						<li><a class="hover:text-blue-600" href="#migrations">Migrations</a></li>
						<li><a class="hover:text-blue-600" href="#cli">CLI commands</a></li>
						<li><a class="hover:text-blue-600" href="#helpers">Helpers</a></li>
					</ul>
				</div>
			</aside>

			<div class="lg:col-span-3 space-y-12">
				<section id="quickstart" class="scroll-mt-24">
					<h2 class="text-2xl font-bold">Quick start</h2>
					<p class="text-gray-600 mt-2">Run the app locally, then create your first view and route.</p>
					<div class="mt-4 bg-gray-900 text-gray-100 rounded-2xl p-5 text-sm overflow-x-auto">
						<pre><code>php -S localhost:8000 -t public
php ndg.php make:view docs</code></pre>
					</div>
					<p class="text-gray-600 mt-3">Visit <span class="font-semibold">/docs</span> in your browser.</p>
				</section>

				<section id="structure" class="scroll-mt-24">
					<h2 class="text-2xl font-bold">Project structure</h2>
					<p class="text-gray-600 mt-2">NDG uses a clean, familiar structure.</p>
					<div class="mt-4 bg-white border rounded-2xl p-5 text-sm text-gray-700">
						<pre><code>app/            Controllers and Models
core/           Framework core classes
resources/      Views, components, layouts, CSS
routes/         Route definitions
migrations/     Migration files
public/         Public web root</code></pre>
					</div>
				</section>

				<section id="routing" class="scroll-mt-24">
					<h2 class="text-2xl font-bold">Routing</h2>
					<p class="text-gray-600 mt-2">Define routes in <span class="font-semibold">routes/web.php</span>.</p>
					<div class="mt-4 bg-gray-900 text-gray-100 rounded-2xl p-5 text-sm overflow-x-auto">
						<pre><code>$router->get('/', [HomeController::class, 'index']);
$router->get('/blog', [HomeController::class, 'blog']);</code></pre>
					</div>
					<p class="text-gray-600 mt-3">Routes map to controller methods or closures.</p>
				</section>

				<section id="controllers" class="scroll-mt-24">
					<h2 class="text-2xl font-bold">Controllers</h2>
					<p class="text-gray-600 mt-2">Controllers keep your logic organized.</p>
					<div class="mt-4 bg-gray-900 text-gray-100 rounded-2xl p-5 text-sm overflow-x-auto">
						<pre><code>class HomeController extends Controller
{
	public function index()
	{
		return view('home', ['title' => 'Welcome']);
	}
}</code></pre>
					</div>
				</section>

				<section id="views" class="scroll-mt-24">
					<h2 class="text-2xl font-bold">Views and components</h2>
					<p class="text-gray-600 mt-2">Views live in <span class="font-semibold">resources/view</span>.</p>
					<div class="mt-4 bg-gray-900 text-gray-100 rounded-2xl p-5 text-sm overflow-x-auto">
						<pre><code>&lt;x-main-layout&gt;
	&lt;h1&gt;Hello NDG&lt;/h1&gt;
	&lt;x-navbar /&gt;
&lt;/x-main-layout&gt;</code></pre>
					</div>
					<p class="text-gray-600 mt-3">Components are resolved from <span class="font-semibold">resources/components</span> and layouts from <span class="font-semibold">resources/layouts</span>.</p>
				</section>

				<section id="assets" class="scroll-mt-24">
					<h2 class="text-2xl font-bold">Assets and Tailwind</h2>
					<p class="text-gray-600 mt-2">Tailwind is enabled through Vite and injected with <span class="font-semibold">vite()</span>.</p>
					<div class="mt-4 bg-gray-900 text-gray-100 rounded-2xl p-5 text-sm overflow-x-auto">
						<pre><code>// In layouts/main-layout.php
<?= htmlspecialchars("<?= vite('resources/css/app.css') ?>") ?>

// In resources/css/app.css
@import "tailwindcss";</code></pre>
					</div>
				</section>

				<section id="database" class="scroll-mt-24">
					<h2 class="text-2xl font-bold">Database and models</h2>
					<p class="text-gray-600 mt-2">Configure your database in <span class="font-semibold">.env</span>.</p>
					<div class="mt-4 bg-white border rounded-2xl p-5 text-sm text-gray-700">
						<pre><code>DB_HOST=127.0.0.1
DB_PORT=3306
DB_NAME=ndg
DB_USER=root
DB_PASS=</code></pre>
					</div>
					<p class="text-gray-600 mt-3">Create a model by extending <span class="font-semibold">Model</span> and set the table name.</p>
					<div class="mt-4 bg-gray-900 text-gray-100 rounded-2xl p-5 text-sm overflow-x-auto">
						<pre><code>class User extends Model
{
	protected static $table = 'users';
}</code></pre>
					</div>
					<p class="text-gray-600 mt-3">Available methods: <span class="font-semibold">all()</span>, <span class="font-semibold">find($id)</span>, <span class="font-semibold">create($data)</span>.</p>
				</section>

				<section id="migrations" class="scroll-mt-24">
					<h2 class="text-2xl font-bold">Migrations</h2>
					<p class="text-gray-600 mt-2">Generate and run database migrations quickly.</p>
					<div class="mt-4 bg-gray-900 text-gray-100 rounded-2xl p-5 text-sm overflow-x-auto">
						<pre><code>php ndg.php make:migration users
php ndg.php migrate
php ndg.php migrate:rollback</code></pre>
					</div>
					<p class="text-gray-600 mt-3">Define schema with the Blueprint API.</p>
					<div class="mt-4 bg-gray-900 text-gray-100 rounded-2xl p-5 text-sm overflow-x-auto">
						<pre><code>Schema::create('users', function($table) {
	$table->id();
	$table->string('name');
	$table->unique('name');
	$table->timestamps();
});</code></pre>
					</div>
					<p class="text-gray-600 mt-3">Supported columns: <span class="font-semibold">string</span>, <span class="font-semibold">text</span>, <span class="font-semibold">integer</span>, <span class="font-semibold">boolean</span>, <span class="font-semibold">timestamps</span>.</p>
				</section>

				<section id="cli" class="scroll-mt-24">
					<h2 class="text-2xl font-bold">CLI commands</h2>
					<p class="text-gray-600 mt-2">The CLI lives in <span class="font-semibold">ndg.php</span>.</p>
					<div class="mt-4 bg-gray-900 text-gray-100 rounded-2xl p-5 text-sm overflow-x-auto">
						<pre><code>php ndg.php make:migration &lt;name&gt;
php ndg.php make:view &lt;name&gt;
php ndg.php migrate
php ndg.php migrate:rollback</code></pre>
					</div>
				</section>

				<section id="helpers" class="scroll-mt-24">
					<h2 class="text-2xl font-bold">Helpers</h2>
					<p class="text-gray-600 mt-2">Useful helpers are available globally.</p>
					<div class="mt-4 bg-gray-900 text-gray-100 rounded-2xl p-5 text-sm overflow-x-auto">
						<pre><code>view('home', ['title' => 'NDG']);
e($value); // HTML escape
vite('resources/css/app.css');</code></pre>
					</div>
				</section>
			</div>
		</div>
	</section>
</x-main-layout>