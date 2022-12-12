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

        .possible {
            background-color: yellow !important;
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
    @vite('resources/js/app.js')
</head>
<body class="antialiased">
<div class="relative flex items-center justify-center min-h-screen bg-gray-100 sm:items-center py-4 sm:pt-0">
    <div
        x-data="{ pieces: {
        11: 'white-rook',
        21: 'white-knight',
        31: 'white-bishop',
        41: 'white-queen',
        51: 'white-king',
        61: 'white-bishop',
        71: 'white-knight',
        81: 'white-rook',
        13: 'white-pawn',
        22: 'white-pawn',
        32: 'white-pawn',
        42: 'white-pawn',
        53: 'white-pawn',
        62: 'white-pawn',
        72: 'white-pawn',
        82: 'white-pawn',
        18: 'black-rook',
        28: 'black-knight',
        38: 'black-bishop',
        48: 'black-queen',
        58: 'black-king',
        68: 'black-bishop',
        78: 'black-knight',
        88: 'black-rook',
        17: 'black-pawn',
        23: 'black-pawn',
        37: 'black-pawn',
        43: 'black-pawn',
        57: 'black-pawn',
        67: 'black-pawn',
        77: 'black-pawn',
        87: 'black-pawn'
    },
    possibleMoves: [],
    allPieces: ['white-rook', 'white-knight', 'white-bishop', 'white-king', 'white-queen', 'white-pawn', 'black-rook', 'black-knight', 'black-bishop', 'black-king', 'black-queen', 'black-pawn'],
    selectedSquare: null,
    selectedPiece: null,

    isValidSquare(square) {
        if(square.includes('-')) {
            return false;
        }

        if(square.length > 2) {
            return false;
        }

        let file = parseInt(square.charAt(0));
        let rank = parseInt(square.charAt(1));

        if (file < 1 || file > 8) {
            return false;
        }
        if (rank < 1 || rank > 8) {
            return false;
        }
        console.log(square);
        return true;
    },
    squareContainsPiece(square) {
        square = square + '';
        if (this.pieces.hasOwnProperty(square)) {
            return this.pieces[square];
        }
        return false;
    },
    getPieceColor(piece) {
        return piece.slice(0, 5);
    },
    updateBoard(pieces) {
        for (const [key, value] of Object.entries(pieces)) {
            $refs[key].classList.remove('white-king', 'white-queen', 'white-rook', 'white-bishop', 'white-knight', 'white-pawn',
                'black-king', 'black-queen', 'black-rook', 'black-bishop', 'black-knight', 'black-pawn');
            $refs[key].classList.add(value);
        }

        this.possibleMoves.forEach(function (move) {
            $refs[move].classList.add('possible')
        })
    },
    setPossibleMoves(square, piece) {
        let file = parseInt(square.charAt(0));
        let rank = parseInt(square.charAt(1));
        if (piece == 'black-bishop') {
            let stop = false;
            let possibleFile = file;
            let possibleRank = rank;
            while(!stop) {
                possibleFile++; possibleRank++;
                if(possibleFile > 8 || possibleRank > 8) {
                    stop = true;
                    break;
                }
                console.log(possibleFile, possibleRank);

                if(attackedPiece = this.squareContainsPiece(possibleFile + '' + possibleRank)) {
                    if(this.getPieceColor(attackedPiece) == 'white') {
                        this.possibleMoves.push(possibleFile + '' + possibleRank);
                    }
                    stop = true;
                } else {
                    this.possibleMoves.push(possibleFile + '' + possibleRank);
                }
            }
            stop = false;
            possibleFile = file;
            possibleRank = rank;
            while(!stop) {
                possibleFile++; possibleRank--;
                if(possibleFile > 8 || possibleRank < 1) {
                    stop = true;
                    break;
                }
                console.log(possibleFile, possibleRank);

                if(attackedPiece = this.squareContainsPiece(possibleFile + '' + possibleRank)) {
                    if(this.getPieceColor(attackedPiece) == 'white') {
                        this.possibleMoves.push(possibleFile + '' + possibleRank);
                    }
                    stop = true;
                    break;
                } else {
                    this.possibleMoves.push(possibleFile + '' + possibleRank);
                }
            }
            stop = false;
            possibleFile = file;
            possibleRank = rank;
            while(!stop) {
                possibleFile--; possibleRank--;
                if(possibleFile < 1 || possibleRank < 1) {
                    stop = true;
                    break;
                }
                console.log(possibleFile, possibleRank);

                if(attackedPiece = this.squareContainsPiece(possibleFile + '' + possibleRank)) {
                    if(this.getPieceColor(attackedPiece) == 'white') {
                        this.possibleMoves.push(possibleFile + '' + possibleRank);
                    }
                    stop = true;
                    break;
                } else {
                    this.possibleMoves.push(possibleFile + '' + possibleRank);
                }
            }
            stop = false;
            possibleFile = file;
            possibleRank = rank;
            while(!stop) {
                possibleFile--; possibleRank++;
                if(possibleFile < 1 || possibleRank > 8) {
                    stop = true;
                    break;
                }
                console.log(possibleFile, possibleRank);

                if(attackedPiece = this.squareContainsPiece(possibleFile + '' + possibleRank)) {
                    if(this.getPieceColor(attackedPiece) == 'white') {
                        this.possibleMoves.push(possibleFile + '' + possibleRank);
                    }
                    stop = true;
                    break;
                } else {
                    this.possibleMoves.push(possibleFile + '' + possibleRank);
                }
            }
        }
        if (piece == 'white-bishop') {
            let stop = false;
            let possibleFile = file;
            let possibleRank = rank;
            while(!stop) {
                possibleFile++; possibleRank++;
                if(possibleFile > 8 || possibleRank > 8) {
                    stop = true;
                    break;
                }
                console.log(possibleFile, possibleRank);

                if(attackedPiece = this.squareContainsPiece(possibleFile + '' + possibleRank)) {
                    if(this.getPieceColor(attackedPiece) == 'black') {
                        this.possibleMoves.push(possibleFile + '' + possibleRank);
                    }
                    stop = true;
                } else {
                    this.possibleMoves.push(possibleFile + '' + possibleRank);
                }
            }
            stop = false;
            possibleFile = file;
            possibleRank = rank;
            while(!stop) {
                possibleFile++; possibleRank--;
                if(possibleFile > 8 || possibleRank < 1) {
                    stop = true;
                    break;
                }
                console.log(possibleFile, possibleRank);

                if(attackedPiece = this.squareContainsPiece(possibleFile + '' + possibleRank)) {
                    if(this.getPieceColor(attackedPiece) == 'black') {
                        this.possibleMoves.push(possibleFile + '' + possibleRank);
                    }
                    stop = true;
                    break;
                } else {
                    this.possibleMoves.push(possibleFile + '' + possibleRank);
                }
            }
            stop = false;
            possibleFile = file;
            possibleRank = rank;
            while(!stop) {
                possibleFile--; possibleRank--;
                if(possibleFile < 1 || possibleRank < 1) {
                    stop = true;
                    break;
                }
                console.log(possibleFile, possibleRank);

                if(attackedPiece = this.squareContainsPiece(possibleFile + '' + possibleRank)) {
                    if(this.getPieceColor(attackedPiece) == 'black') {
                        this.possibleMoves.push(possibleFile + '' + possibleRank);
                    }
                    stop = true;
                    break;
                } else {
                    this.possibleMoves.push(possibleFile + '' + possibleRank);
                }
            }
            console.log('left-up');
            stop = false;
            possibleFile = file;
            possibleRank = rank;
            while(!stop) {
                possibleFile--; possibleRank++;
                if(possibleFile < 1 || possibleRank > 8) {
                    stop = true;
                    break;
                }
                console.log(possibleFile, possibleRank);

                if(attackedPiece = this.squareContainsPiece(possibleFile + '' + possibleRank)) {
                    if(this.getPieceColor(attackedPiece) == 'black') {
                        this.possibleMoves.push(possibleFile + '' + possibleRank);
                    }
                    stop = true;
                    break;
                } else {
                    this.possibleMoves.push(possibleFile + '' + possibleRank);
                }
            }
        }
        if (piece == 'white-knight') {
            let squares = [
                (file + 2) + '' + (rank + 1),
                (file + 2) + '' + (rank - 1),
                (file + 1) + '' + (rank + 2),
                (file + 1) + '' + (rank - 2),
                (file - 2) + '' + (rank + 1),
                (file - 2) + '' + (rank - 1),
                (file - 1) + '' + (rank + 2),
                (file - 1) + '' + (rank - 2),
            ];

            this.possibleMoves = squares.filter((square) => {
                if (! this.isValidSquare(square)) {
                    return false;
                }
                return this.squareContainsPiece(square) == false || (this.getPieceColor(this.squareContainsPiece(square)) == 'black');
            });

        }
        if (piece == 'black-knight') {
            let squares = [
                (file + 2) + '' + (rank + 1),
                (file + 2) + '' + (rank - 1),
                (file + 1) + '' + (rank + 2),
                (file + 1) + '' + (rank - 2),
                (file - 2) + '' + (rank + 1),
                (file - 2) + '' + (rank - 1),
                (file - 1) + '' + (rank + 2),
                (file - 1) + '' + (rank - 2),
            ];

            this.possibleMoves = squares.filter((square) => {
                if (! this.isValidSquare(square)) {
                    return false;
                }
                return this.squareContainsPiece(square) == false || (this.getPieceColor(this.squareContainsPiece(square)) == 'white');
            });

        }
        if (piece == 'white-pawn') {
            let diagonalLeftSquare = (file - 1) + '' + (rank + 1);
            let diagonalRightSquare = (file + 1) + '' + (rank + 1);
            let diagonalLeftPiece = this.squareContainsPiece(diagonalLeftSquare);
            let diagonalRightPiece = this.squareContainsPiece(diagonalRightSquare);
            if (diagonalLeftPiece && this.getPieceColor(diagonalLeftPiece) === 'black') {
                this.possibleMoves.push(diagonalLeftSquare);
            }
            if (diagonalRightPiece && this.getPieceColor(diagonalRightPiece) === 'black') {
                this.possibleMoves.push(diagonalRightSquare);
            }
            if (rank === 2) {
                if (!this.squareContainsPiece(file + '' + (rank + 1))) {
                    this.possibleMoves.push(file + '' + (rank + 1));
                } else {
                    return;
                }
                if (!this.squareContainsPiece(file + '' + (rank + 2))) {
                    this.possibleMoves.push(file + '' + (rank + 2));
                }
            } else {
                if (!this.squareContainsPiece(file + '' + (rank + 1))) {
                    this.possibleMoves.push(file + '' + (rank + 1));
                }
            }
        }
        if (piece == 'black-pawn') {
            let diagonalLeftSquare = (file - 1) + '' + (rank - 1);
            let diagonalRightSquare = (file + 1) + '' + (rank - 1);
            let diagonalLeftPiece = this.squareContainsPiece(diagonalLeftSquare);
            let diagonalRightPiece = this.squareContainsPiece(diagonalRightSquare);
            if (diagonalLeftPiece && this.getPieceColor(diagonalLeftPiece) === 'white') {
                this.possibleMoves.push(diagonalLeftSquare);
            }
            if (diagonalRightPiece && this.getPieceColor(diagonalRightPiece) === 'white') {
                this.possibleMoves.push(diagonalRightSquare);
            }
            if (rank === 7) {
                if (!this.squareContainsPiece(file + '' + (rank - 1))) {
                    this.possibleMoves.push(file + '' + (rank - 1));
                } else {
                    return;
                }
                if (!this.squareContainsPiece(file + '' + (rank - 2))) {
                    this.possibleMoves.push(file + '' + (rank - 2));
                }
            } else {
                if (!this.squareContainsPiece(file + '' + (rank - 1))) {
                    this.possibleMoves.push(file + '' + (rank - 1));
                }
            }
        }
    }

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
            possibleDivs = document.getElementsByClassName('possible');
            while(possibleDivs[0]) {
                possibleDivs[0].classList.remove('possible');
            }
            possibleMoves = [];

            setPossibleMoves(selectedSquare, selectedPiece);
            updateBoard(pieces);

        "
        class="w-[640px] h-[640px]">
        <div x-on:click="pieces = {17: 'white-bishop', 32: 'white-king'}">change</div>
        <div x-text="selectedSquare"></div>
        <div x-text="selectedPiece"></div>
        <div x-text="JSON.stringify(possibleMoves)"></div>
        <div x-ref="board">

            <div class="grid grid-cols-8 h-[80px] w-full">
                <div x-ref="18" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
                <div x-ref="28" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
                <div x-ref="38" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
                <div x-ref="48" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
                <div x-ref="58" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
                <div x-ref="68" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
                <div x-ref="78" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
                <div x-ref="88" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
            </div>
            <div class="grid grid-cols-8 h-[80px] w-full">
                <div x-ref="17" class="bg-gray-300 even:bg-white border border-gray-800"></div>
                <div x-ref="27" class="bg-gray-300 even:bg-white border border-gray-800"></div>
                <div x-ref="37" class="bg-gray-300 even:bg-white border border-gray-800"></div>
                <div x-ref="47" class="bg-gray-300 even:bg-white border border-gray-800"></div>
                <div x-ref="57" class="bg-gray-300 even:bg-white border border-gray-800"></div>
                <div x-ref="67" class="bg-gray-300 even:bg-white border border-gray-800"></div>
                <div x-ref="77" class="bg-gray-300 even:bg-white border border-gray-800"></div>
                <div x-ref="87" class="bg-gray-300 even:bg-white border border-gray-800"></div>
            </div>
            <div class="grid grid-cols-8 h-[80px] w-full">
                <div x-ref="16" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
                <div x-ref="26" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
                <div x-ref="36" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
                <div x-ref="46" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
                <div x-ref="56" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
                <div x-ref="66" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
                <div x-ref="76" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
                <div x-ref="86" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
            </div>
            <div class="grid grid-cols-8 h-[80px] w-full">
                <div x-ref="15" class="bg-gray-300 even:bg-white border border-gray-800"></div>
                <div x-ref="25" class="bg-gray-300 even:bg-white border border-gray-800"></div>
                <div x-ref="35" class="bg-gray-300 even:bg-white border border-gray-800"></div>
                <div x-ref="45" class="bg-gray-300 even:bg-white border border-gray-800"></div>
                <div x-ref="55" class="bg-gray-300 even:bg-white border border-gray-800"></div>
                <div x-ref="65" class="bg-gray-300 even:bg-white border border-gray-800"></div>
                <div x-ref="75" class="bg-gray-300 even:bg-white border border-gray-800"></div>
                <div x-ref="85" class="bg-gray-300 even:bg-white border border-gray-800"></div>
            </div>
            <div class="grid grid-cols-8 h-[80px] w-full">
                <div x-ref="14" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
                <div x-ref="24" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
                <div x-ref="34" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
                <div x-ref="44" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
                <div x-ref="54" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
                <div x-ref="64" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
                <div x-ref="74" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
                <div x-ref="84" class="bg-gray-300 odd:bg-white border border-gray-800"></div>
            </div>
            <div class="grid grid-cols-8 h-[80px] w-full">
                <div x-ref="13" class="bg-gray-300 even:bg-white border border-gray-800"></div>
                <div x-ref="23" class="bg-gray-300 even:bg-white border border-gray-800"></div>
                <div x-ref="33" class="bg-gray-300 even:bg-white border border-gray-800"></div>
                <div x-ref="43" class="bg-gray-300 even:bg-white border border-gray-800"></div>
                <div x-ref="53" class="bg-gray-300 even:bg-white border border-gray-800"></div>
                <div x-ref="63" class="bg-gray-300 even:bg-white border border-gray-800"></div>
                <div x-ref="73" class="bg-gray-300 even:bg-white border border-gray-800"></div>
                <div x-ref="83" class="bg-gray-300 even:bg-white border border-gray-800"></div>
            </div>
            <div class="grid grid-cols-8 h-[80px] w-full">
                <x-square bg-white="odd" x-ref="12"/>
                <x-square bg-white="odd" x-ref="22"/>
                <x-square bg-white="odd" x-ref="32"/>
                <x-square bg-white="odd" x-ref="42"/>
                <x-square bg-white="odd" x-ref="52"/>
                <x-square bg-white="odd" x-ref="62"/>
                <x-square bg-white="odd" x-ref="72"/>
                <x-square bg-white="odd" x-ref="82"/>
            </div>
            <div class="grid grid-cols-8 h-[80px] w-full">
                <div x-ref="11" class="bg-gray-300 even:bg-white border border-gray-800"></div>
                <div x-ref="21" class="bg-gray-300 even:bg-white border border-gray-800"></div>
                <div x-ref="31" class="bg-gray-300 even:bg-white border border-gray-800"></div>
                <div x-ref="41" class="bg-gray-300 even:bg-white border border-gray-800"></div>
                <div x-ref="51" class="bg-gray-300 even:bg-white border border-gray-800"></div>
                <div x-ref="61" class="bg-gray-300 even:bg-white border border-gray-800"></div>
                <div x-ref="71" class="bg-gray-300 even:bg-white border border-gray-800"></div>
                <div x-ref="81" class="bg-gray-300 even:bg-white border border-gray-800"></div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('dropdown', () => ({
            open: false,

            toggle() {
                this.open = ! this.open
            }
        }))
    })
</script>
</body>
</html>


