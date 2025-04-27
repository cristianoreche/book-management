<?php

namespace Tests\Unit\Http\Requests;

use App\Http\Requests\AssuntoRequest;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class AssuntoRequestTest extends TestCase
{
    /** @test */
    public function validation_rules_for_assunto()
    {
        $request = new AssuntoRequest();

        $this->assertEquals([
            'nome' => ['required', 'string', 'max:255'] // Agora como array
        ], $request->rules());
    }

    /** @test */
    public function test_validation_fails_without_required_fields()
    {
        $request = new AssuntoRequest();
        $validator = Validator::make([], $request->rules());

        $this->assertFalse($validator->passes());
        $this->assertArrayHasKey('nome', $validator->errors()->toArray());
    }

    /** @test */
    public function test_validation_passes_with_valid_data()
    {
        $data = ['nome' => 'Assunto Teste'];

        $request = new AssuntoRequest();
        $validator = Validator::make($data, $request->rules());

        $this->assertTrue($validator->passes());
    }
}
