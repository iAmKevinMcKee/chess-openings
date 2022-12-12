export default () => ({
    pieces: {
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
        52: 'white-pawn',
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
    isValidSquare(square) {
        return true;
        let file = parseInt(square.charAt(0));
        let rank = parseInt(square.charAt(1));

        if (file < 1 || file > 8) {
            return false;
        }
        if (rank < 1 || file > 8) {
            return false;
        }
        return true;
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
        if (piece == 'white-knight') {
            console.log(isValidSquare('33'));
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
            console.log(squares);
            this.possibleMoves = squares.filter(function (square) {
                if (!this.isValidSquare(square)) {
                    return false;
                }
                return this.squareContainsPiece(square) == false || (this.getPieceColor(this.squareContainsPiece(square)) == 'black');
            });


        }
        if (piece == 'white-pawn') {
            let diagonalLeftSquare = (file - 1) + '' + (rank + 1);
            console.log(diagonalLeftSquare);
            let diagonalRightSquare = (file + 1) + '' + (rank + 1);
            let diagonalLeftPiece = this.squareContainsPiece(diagonalLeftSquare);
            let diagonalRightPiece = this.squareContainsPiece(diagonalRightSquare);
            console.log(diagonalLeftSquare);
            console.log(diagonalLeftPiece);
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
            console.log(diagonalLeftSquare);
            let diagonalRightSquare = (file + 1) + '' + (rank - 1);
            let diagonalLeftPiece = this.squareContainsPiece(diagonalLeftSquare);
            let diagonalRightPiece = this.squareContainsPiece(diagonalRightSquare);
            console.log(diagonalLeftSquare);
            console.log(diagonalLeftPiece);
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
})
