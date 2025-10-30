public function run(): void
{
    $this->call([
        CategoriaSeeder::class,
        TarefaSeeder::class,
    ]);
}
