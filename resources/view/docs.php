<x-main-layout>
	<section class="bg-gradient-to-b from-white to-blue-50/40 border-b">
		<div class="max-w-6xl mx-auto px-6 py-16">
			<div class="inline-flex items-center gap-2 rounded-full border border-blue-200 bg-blue-50 px-4 py-2 text-sm text-blue-700">
				<span class="font-semibold">NDG Framework</span>
				<span>Documentation</span>
			</div>

			<h1 class="text-4xl md:text-5xl font-bold mt-6 tracking-tight">
				Build Fast, Secure, Modern PHP Apps
			</h1>

			<p class="text-lg text-gray-600 mt-4 max-w-3xl">
				This guide includes the latest NDG updates: secure authentication, the new components marketplace,
				and the improved CLI format using <span class="font-semibold">php ndg &lt;command&gt;</span>.
			</p>

			<div class="mt-8 flex flex-wrap gap-3">
				<a href="#quickstart" class="px-5 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
					Quick Start
				</a>
				<a href="#auth" class="px-5 py-3 border rounded-lg hover:bg-gray-100 transition">
					Authentication
				</a>
				<a href="#components-marketplace" class="px-5 py-3 border rounded-lg hover:bg-gray-100 transition">
					Components Marketplace
				</a>
			</div>
		</div>
	</section>

	<section class="max-w-6xl mx-auto px-6 -mt-6">
		<div class="grid md:grid-cols-3 gap-6">
			<div class="bg-white rounded-2xl shadow p-6 border">
				<h3 class="font-semibold text-lg">Secure by Default</h3>
				<p class="text-gray-600 mt-2">Auth includes password hashing, CSRF checks, session regeneration, and route protection.</p>
			</div>
			<div class="bg-white rounded-2xl shadow p-6 border">
				<h3 class="font-semibold text-lg">Component Marketplace</h3>
				<p class="text-gray-600 mt-2">Install reusable UI components from an API directly into your project.</p>
			</div>
			<div class="bg-white rounded-2xl shadow p-6 border">
				<h3 class="font-semibold text-lg">Cleaner CLI</h3>
				<p class="text-gray-600 mt-2">Use the new command style: <span class="font-semibold">php ndg ...</span>.</p>
			</div>
		</div>
	</section>

	<section class="max-w-6xl mx-auto px-6 py-16">
		<div class="grid lg:grid-cols-4 gap-10">
			<aside class="lg:col-span-1">
				<div class="sticky top-6 bg-white border rounded-2xl p-5 shadow-sm">
					<h3 class="font-semibold">On this page</h3>
					<ul class="mt-4 space-y-2 text-sm text-gray-600">
						<li><a class="hover:text-blue-600" href="#quickstart">Quick start</a></li>
						<li><a class="hover:text-blue-600" href="#structure">Project structure</a></li>
						<li><a class="hover:text-blue-600" href="#routing">Routing</a></li>
						<li><a class="hover:text-blue-600" href="#controllers">Controllers</a></li>
						<li><a class="hover:text-blue-600" href="#views">Views and components</a></li>
						<li><a class="hover:text-blue-600" href="#auth">Authentication</a></li>
						<li><a class="hover:text-blue-600" href="#components-marketplace">Components marketplace</a></li>
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
					<h2 class="text-2xl font-bold">Quick Start</h2>
					<p class="text-gray-600 mt-2">Run the app locally and generate your first view.</p>
					<div class="mt-4 bg-gray-900 text-gray-100 rounded-2xl p-5 text-sm overflow-x-auto">
						<pre><code>php -S localhost:8000 -t public
php ndg make:view test</code></pre>
					</div>
					<p class="text-gray-600 mt-3">Open <span class="font-semibold">/test</span> in your browser.</p>
				</section>

				<section id="structure" class="scroll-mt-24">
					<h2 class="text-2xl font-bold">Project Structure</h2>
					<p class="text-gray-600 mt-2">NDG uses a simple, familiar layout.</p>
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
$router->post('/login', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);</code></pre>
					</div>
					<p class="text-gray-600 mt-3">Routes can target controller methods or closures.</p>
				</section>

				<section id="controllers" class="scroll-mt-24">
					<h2 class="text-2xl font-bold">Controllers</h2>
					<p class="text-gray-600 mt-2">Controllers keep request logic clean and reusable.</p>
					<div class="mt-4 bg-gray-900 text-gray-100 rounded-2xl p-5 text-sm overflow-x-auto">
						<pre><code>class HomeController extends Controller
{
	public function index()
	{
		return view('home');
	}
}</code></pre>
					</div>
				</section>

				<section id="views" class="scroll-mt-24">
					<h2 class="text-2xl font-bold">Views and Components</h2>
					<p class="text-gray-600 mt-2">Views live in <span class="font-semibold">resources/view</span>.</p>
					<div class="mt-4 bg-gray-900 text-gray-100 rounded-2xl p-5 text-sm overflow-x-auto">
						<pre><code>&lt;x-main-layout&gt;
	&lt;h1&gt;Hello NDG&lt;/h1&gt;
	&lt;x-navbar /&gt;
&lt;/x-main-layout&gt;</code></pre>
					</div>
					<p class="text-gray-600 mt-3">Components are resolved from <span class="font-semibold">resources/components</span> and layouts from <span class="font-semibold">resources/layouts</span>.</p>
				</section>

				<section id="auth" class="scroll-mt-24">
					<h2 class="text-2xl font-bold">Authentication (New)</h2>
					<p class="text-gray-600 mt-2">
						NDG now includes a secure auth flow with registration, login, logout, CSRF protection,
						password hashing, and session hardening.
					</p>
					<div class="mt-4 bg-white border rounded-2xl p-5 text-sm text-gray-700 space-y-2">
						<p><span class="font-semibold">Routes:</span> /register, /login, /logout</p>
						<p><span class="font-semibold">Security:</span> password_hash, password_verify, session_regenerate_id, CSRF tokens</p>
						<p><span class="font-semibold">Protection:</span> restricted routes redirect guests to /login</p>
					</div>
					<div class="mt-4 bg-gray-900 text-gray-100 rounded-2xl p-5 text-sm overflow-x-auto">
						<pre><code>if (!Auth::check()) {
	redirect('/login');
}</code></pre>
					</div>
				</section>

				<section id="components-marketplace" class="scroll-mt-24">
					<h2 class="text-2xl font-bold">Components Marketplace (New)</h2>
					<p class="text-gray-600 mt-2">
						Download reusable components from an API directly into your project.
						By default, NDG uses <span class="font-semibold">https://ndg-webdesign.net/api/components</span>.
					</p>
					<div class="mt-4 bg-gray-900 text-gray-100 rounded-2xl p-5 text-sm overflow-x-auto">
						<pre><code>php ndg components list
php ndg components search navbar
php ndg components install footer</code></pre>
					</div>
					<p class="text-gray-600 mt-3">Installed files are saved in <span class="font-semibold">resources/components</span>.</p>
				</section>

				<section id="assets" class="scroll-mt-24">
					<h2 class="text-2xl font-bold">Assets and Tailwind</h2>
					<p class="text-gray-600 mt-2">Tailwind is powered by Vite and loaded with <span class="font-semibold">vite()</span>.</p>
					<div class="mt-4 bg-gray-900 text-gray-100 rounded-2xl p-5 text-sm overflow-x-auto">
						<pre><code>// In layouts/main-layout.php
<?= htmlspecialchars("<?= vite('resources/css/app.css') ?>") ?>

// In resources/css/app.css
@import "tailwindcss";</code></pre>
					</div>
				</section>

				<section id="database" class="scroll-mt-24">
					<h2 class="text-2xl font-bold">Database and Models</h2>
					<p class="text-gray-600 mt-2">Configure your connection in <span class="font-semibold">.env</span>.</p>
					<div class="mt-4 bg-white border rounded-2xl p-5 text-sm text-gray-700">
						<pre><code>DB_HOST=127.0.0.1
DB_PORT=3306
DB_NAME=ndg
DB_USER=root
DB_PASS=</code></pre>
					</div>
					<p class="text-gray-600 mt-3">Create a model by extending <span class="font-semibold">Model</span> and setting <span class="font-semibold">$table</span>.</p>
				</section>

				<section id="migrations" class="scroll-mt-24">
					<h2 class="text-2xl font-bold">Migrations</h2>
					<p class="text-gray-600 mt-2">Generate and run schema changes quickly.</p>
					<div class="mt-4 bg-gray-900 text-gray-100 rounded-2xl p-5 text-sm overflow-x-auto">
						<pre><code>php ndg make:migration users
php ndg migrate
php ndg migrate:rollback</code></pre>
					</div>
					<p class="text-gray-600 mt-3">Blueprint supports: <span class="font-semibold">string</span>, <span class="font-semibold">text</span>, <span class="font-semibold">integer</span>, <span class="font-semibold">boolean</span>, <span class="font-semibold">timestamps</span>, <span class="font-semibold">unique</span>.</p>
				</section>

				<section id="cli" class="scroll-mt-24">
					<h2 class="text-2xl font-bold">CLI Commands</h2>
					<p class="text-gray-600 mt-2">Use the new format: <span class="font-semibold">php ndg &lt;command&gt;</span>.</p>
					<div class="mt-4 bg-gray-900 text-gray-100 rounded-2xl p-5 text-sm overflow-x-auto">
						<pre><code>php ndg make:migration &lt;name&gt;
php ndg make:view &lt;name&gt;
php ndg migrate
php ndg migrate:rollback
php ndg components list</code></pre>
					</div>
				</section>

				<section id="helpers" class="scroll-mt-24">
					<h2 class="text-2xl font-bold">Helpers</h2>
					<p class="text-gray-600 mt-2">Useful global helpers are available:</p>
					<div class="mt-4 bg-gray-900 text-gray-100 rounded-2xl p-5 text-sm overflow-x-auto">
						<pre><code>view('home', ['title' => 'NDG']);
e($value);
vite('resources/css/app.css');
redirect('/login');
csrf_field();
auth_check();
auth_user();</code></pre>
					</div>
				</section>
			</div>
		</div>
	</section>
</x-main-layout>