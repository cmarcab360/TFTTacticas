<x-layout>
@foreach($teams as $team)
    <p>Victories: {{ $team->victories }}</p>
    <p>Num Matches: {{ $team->num_match }}</p>
    <p>Position: {{ $team->position }}</p>
    <p>Item 1: {{ $team->item1 }}</p>
    <p>Item 2: {{ $team->item2 }}</p>
    <p>Item 3: {{ $team->item3 }}</p>
    <hr>
@endforeach
</x-layout>