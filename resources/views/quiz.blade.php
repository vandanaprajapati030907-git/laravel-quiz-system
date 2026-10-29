
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add MCQs</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen">

    <x-navbar :name="$name" />

    <div class="flex justify-center py-12 px-4">
        <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">

            <h2 class="text-center text-green-600 font-semibold mb-3">
                Quiz: {{ $quizName }}
            </h2>

            <h1 class="text-3xl text-center text-gray-800 mb-8">
                Add MCQs
            </h1>

            <form action="{{ url('/add-mcqs') }}" method="POST"
                  class="space-y-5">
                @csrf

                <div id="questions-container">
                    <div class="question-block space-y-4 border-b pb-6 mb-6">

                        <textarea name="questions[0][question]"
                            placeholder="Enter your question"
                            class="w-full px-4 py-3 border rounded-xl"
                            required></textarea>

                        <input name="questions[0][option_a]"
                            placeholder="Enter first option"
                            class="w-full px-4 py-3 border rounded-xl"
                            required>

                        <input name="questions[0][option_b]"
                            placeholder="Enter second option"
                            class="w-full px-4 py-3 border rounded-xl"
                            required>

                        <input name="questions[0][option_c]"
                            placeholder="Enter third option"
                            class="w-full px-4 py-3 border rounded-xl"
                            required>

                        <input name="questions[0][option_d]"
                            placeholder="Enter fourth option"
                            class="w-full px-4 py-3 border rounded-xl"
                            required>

                        <select name="questions[0][correct_answer]"
                            class="w-full px-4 py-3 border rounded-xl"
                            required>
                            <option value="">Select Right Answer</option>
                            <option value="A">First Option</option>
                            <option value="B">Second Option</option>
                            <option value="C">Third Option</option>
                            <option value="D">Fourth Option</option>
                        </select>

                    </div>
                </div>

                <button type="button" id="add-more"
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white py-3 rounded-xl">
                    Add More
                </button>

                <button type="submit"
                    class="w-full bg-green-600 hover:bg-green-700 text-white py-3 rounded-xl">
                    Add and Submit
                </button>
            </form>

        </div>
    </div>

    <script>
        let questionCount = 1;

        document.getElementById('add-more').addEventListener('click', function () {
            const container = document.getElementById('questions-container');

            const block = document.createElement('div');
            block.className = 'question-block space-y-4 border-b pb-6 mb-6';

            block.innerHTML = `
                <textarea name="questions[${questionCount}][question]"
                    placeholder="Enter your question"
                    class="w-full px-4 py-3 border rounded-xl" required></textarea>

                <input name="questions[${questionCount}][option_a]"
                    placeholder="Enter first option"
                    class="w-full px-4 py-3 border rounded-xl" required>

                <input name="questions[${questionCount}][option_b]"
                    placeholder="Enter second option"
                    class="w-full px-4 py-3 border rounded-xl" required>

                <input name="questions[${questionCount}][option_c]"
                    placeholder="Enter third option"
                    class="w-full px-4 py-3 border rounded-xl" required>

                <input name="questions[${questionCount}][option_d]"
                    placeholder="Enter fourth option"
                    class="w-full px-4 py-3 border rounded-xl" required>

                <select name="questions[${questionCount}][correct_answer]"
                    class="w-full px-4 py-3 border rounded-xl" required>
                    <option value="">Select Right Answer</option>
                    <option value="A">First Option</option>
                    <option value="B">Second Option</option>
                    <option value="C">Third Option</option>
                    <option value="D">Fourth Option</option>
                </select>
            `;

            container.appendChild(block);
            questionCount++;
        });
    </script>

</body>
</html>
