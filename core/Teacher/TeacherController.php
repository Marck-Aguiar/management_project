<?php

namespace Core\Teacher;

use Core\Teacher\DTOs\TeacherDTO;
use Illuminate\Http\Request;
use Core\Teacher\Cases\CreateTeacher;
use Core\Teacher\Cases\UpdateTeacher;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class TeacherController extends Controller
{
    public function store(Request $request, CreateTeacher $case)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:teachers,email',
                'discipline_id' => 'required|exists:disciplines,id',
            ]);

            $payload = new TeacherDTO(
                name: $data['name'],
                email: $data['email'],
                disciplineID: $data['discipline_id'],
            );

            return $case->execute($payload);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, UpdateTeacher $case, $teacherID)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'discipline_id' => 'required|exists:disciplines,id',
            ]);

            $payload = new TeacherDTO(
                name: $data['name'],
                email: $data['email'],
                disciplineID: $data['discipline_id'],
            );

            return $case->execute($teacherID, $payload);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
