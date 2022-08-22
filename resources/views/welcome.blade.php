<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .white-king {
            background-image: url('/white-king.png');
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
        }

        .white-queen {
            background-image: url('/white-queen.png');
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
        }

        .white-rook {
            background-image: url('/white-rook.png');
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
        }

        .white-bishop {
            background-image: url('/white-bishop.png');
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
        }

        .white-knight {
            background-image: url('/white-knight.png');
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
        }

        .white-pawn {
            background-image: url('/white-pawn.png');
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
        }

        .black-king {
            background-image: url('/black-king.png');
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
        }

        .black-queen {
            background-image: url('/black-queen.png');
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
        }

        .black-rook {
            background-image: url('/black-rook.png');
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
        }

        .black-bishop {
            background-image: url('/black-bishop.png');
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
        }

        .black-knight {
            background-image: url('/black-knight.png');
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
        }

        .black-pawn {
            background-image: url('/black-pawn.png');
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="antialiased">
<div class="relative flex items-center justify-center min-h-screen bg-gray-100 sm:items-center py-4 sm:pt-0">
    <div
        x-data="{
            pieces: {
            a1: 'white-rook', b1: 'white-knight', c1: 'white-bishop', d1: 'white-queen', e1: 'white-king', f1: 'white-bishop', g1: 'white-knight', h1: 'white-rook',
            a2: 'white-pawn', b2: 'white-pawn', c2: 'white-pawn', d2: 'white-pawn', e2: 'white-pawn', f2: 'white-pawn', g2: 'white-pawn', h2: 'white-pawn',
            a8: 'black-rook', b8: 'black-knight', c8: 'black-bishop', d8: 'black-queen', e8: 'black-king', f8: 'black-bishop', g8: 'black-knight', h8: 'black-rook',
            a7: 'black-pawn', b7: 'black-pawn', c7: 'black-pawn', d7: 'black-pawn', e7: 'black-pawn', f7: 'black-pawn', g7: 'black-pawn', h7: 'black-pawn'
            },
            selectedSquare: null,
            selectedPiece: null,
            updateBoard(pieces) {
                for (const [key, value] of Object.entries(pieces)) {
                    $refs[key].classList.remove('white-king', 'white-queen', 'white-rook', 'white-bishop', 'white-knight', 'white-pawn',
                    'black-king', 'black-queen', 'black-rook', 'black-bishop', 'black-knight', 'black-pawn');
                    $refs[key].classList.add(value);
                }
            },
        }"
        x-init="
            updateBoard(pieces);
            $watch('pieces', (pieces) => {
                updateBoard(pieces);
            });
        "
        x-on:click="
            selectedSquare = $event.target.getAttribute('x-ref');
            selectedPiece = pieces[selectedSquare];
        "
        class="w-[640px] h-[640px]">
        <div x-on:click="pieces = {a7: 'white-bishop', c2: 'white-king'}">change</div>
        <div x-text="selectedSquare"></div>
        <div x-text="selectedPiece"></div>
        <div class="grid grid-cols-8 h-[80px] w-full">
            <div x-ref="a8" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
            <div x-ref="b8" class="bg-gray-300 odd:bg-white border border-gray-800 white-king"></div>
            <div x-ref="c8" class="bg-gray-300 odd:bg-white border border-gray-800 white-king"></div>
            <div x-ref="d8" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
            <div x-ref="e8" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
            <div x-ref="f8" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
            <div x-ref="g8" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
            <div x-ref="h8" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
        </div>
        <div class="grid grid-cols-8 h-[80px] w-full">
            <div x-ref="a7" class="bg-gray-300 even:bg-white border border-gray-800"></div>
            <div x-ref="b7" class="bg-gray-300 even:bg-white border border-gray-800"></div>
            <div x-ref="c7" class="bg-gray-300 even:bg-white border border-gray-800"></div>
            <div x-ref="d7" class="bg-gray-300 even:bg-white border border-gray-800"></div>
            <div x-ref="e7" class="bg-gray-300 even:bg-white border border-gray-800"></div>
            <div x-ref="f7" class="bg-gray-300 even:bg-white border border-gray-800"></div>
            <div x-ref="g7" class="bg-gray-300 even:bg-white border border-gray-800"></div>
            <div x-ref="h7" class="bg-gray-300 even:bg-white border border-gray-800"></div>
        </div>
        <div class="grid grid-cols-8 h-[80px] w-full">
            <div x-ref="a6" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
            <div x-ref="b6" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
            <div x-ref="c6" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
            <div x-ref="d6" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
            <div x-ref="e6" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
            <div x-ref="f6" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
            <div x-ref="g6" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
            <div x-ref="h6" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
        </div>
        <div class="grid grid-cols-8 h-[80px] w-full">
            <div x-ref="a5" class="bg-gray-300 even:bg-white border border-gray-800"></div>
            <div x-ref="b5" class="bg-gray-300 even:bg-white border border-gray-800"></div>
            <div x-ref="c5" class="bg-gray-300 even:bg-white border border-gray-800"></div>
            <div x-ref="d5" class="bg-gray-300 even:bg-white border border-gray-800"></div>
            <div x-ref="e5" class="bg-gray-300 even:bg-white border border-gray-800"></div>
            <div x-ref="f5" class="bg-gray-300 even:bg-white border border-gray-800"></div>
            <div x-ref="g5" class="bg-gray-300 even:bg-white border border-gray-800"></div>
            <div x-ref="h5" class="bg-gray-300 even:bg-white border border-gray-800"></div>
        </div>
        <div class="grid grid-cols-8 h-[80px] w-full">
            <div x-ref="a4" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
            <div x-ref="b4" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
            <div x-ref="c4" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
            <div x-ref="d4" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
            <div x-ref="e4" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
            <div x-ref="f4" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
            <div x-ref="g4" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
            <div x-ref="h4" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
        </div>
        <div class="grid grid-cols-8 h-[80px] w-full">
            <div x-ref="a3" class="bg-gray-300 even:bg-white border border-gray-800"></div>
            <div x-ref="b3" class="bg-gray-300 even:bg-white border border-gray-800"></div>
            <div x-ref="c3" class="bg-gray-300 even:bg-white border border-gray-800"></div>
            <div x-ref="d3" class="bg-gray-300 even:bg-white border border-gray-800"></div>
            <div x-ref="e3" class="bg-gray-300 even:bg-white border border-gray-800"></div>
            <div x-ref="f3" class="bg-gray-300 even:bg-white border border-gray-800"></div>
            <div x-ref="g3" class="bg-gray-300 even:bg-white border border-gray-800"></div>
            <div x-ref="h3" class="bg-gray-300 even:bg-white border border-gray-800"></div>
        </div>
        <div class="grid grid-cols-8 h-[80px] w-full">
            <x-square bg-white="odd" x-ref="a2"/>
            <x-square bg-white="odd" x-ref="b2"/>
            <x-square bg-white="odd" x-ref="c2"/>
            <x-square bg-white="odd" x-ref="d2"/>
            <x-square bg-white="odd" x-ref="e2"/>
            <x-square bg-white="odd" x-ref="f2"/>
            <x-square bg-white="odd" x-ref="g2"/>
            <x-square bg-white="odd" x-ref="h2"/>
        </div>
        <div class="grid grid-cols-8 h-[80px] w-full">
            <div x-ref="a1" class="bg-gray-300 even:bg-white border border-gray-800"></div>
            <div x-ref="b1" class="bg-gray-300 even:bg-white border border-gray-800"></div>
            <div x-ref="c1" class="bg-gray-300 even:bg-white border border-gray-800"></div>
            <div x-ref="d1" class="bg-gray-300 even:bg-white border border-gray-800"></div>
            <div x-ref="e1" class="bg-gray-300 even:bg-white border border-gray-800"></div>
            <div x-ref="f1" class="bg-gray-300 even:bg-white border border-gray-800"></div>
            <div x-ref="g1" class="bg-gray-300 even:bg-white border border-gray-800"></div>
            <div x-ref="h1" class="bg-gray-300 even:bg-white border border-gray-800"></div>
        </div>
    </div>
</div>
</body>
</html>
