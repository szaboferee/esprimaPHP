<?php
/**
 * Created by PhpStorm.
 * User: szaboferee
 * Date: 12/20/14
 * Time: 12:58 AM
 */

namespace test;


class CommentsTest extends BaseTestCase
{

	protected function getFixtures()
	{
		return json_decode('
		{
    "/* block comment */ 42": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "Literal",
            "value": 42,
            "raw": "42",
            "range": [
                20,
                22
            ],
            "loc": {
                "start": {
                    "line": 1,
                    "column": 20
                },
                "end": {
                    "line": 1,
                    "column": 22
                }
            }
        },
        "range": [
            20,
            22
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 20
            },
            "end": {
                "line": 1,
                "column": 22
            }
        }
    },
    "42 /* block comment 1 */ /* block comment 2 */": {
        "type": "Program",
        "body": [
            {
                "type": "ExpressionStatement",
                "expression": {
                    "type": "Literal",
                    "value": 42,
                    "raw": "42",
                    "range": [
                        0,
                        2
                    ],
                    "trailingComments": [
                        {
                            "type": "Block",
                            "value": " block comment 1 ",
                            "range": [
                                3,
                                24
                            ]
                        },
                        {
                            "type": "Block",
                            "value": " block comment 2 ",
                            "range": [
                                25,
                                46
                            ]
                        }
                    ]
                },
                "range": [
                    0,
                    46
                ]
            }
        ],
        "range": [
            0,
            46
        ],
        "comments": [
            {
                "type": "Block",
                "value": " block comment 1 ",
                "range": [
                    3,
                    24
                ]
            },
            {
                "type": "Block",
                "value": " block comment 2 ",
                "range": [
                    25,
                    46
                ]
            }
        ],
        "tokens": [
            {
                "type": "Numeric",
                "range": [
                    0,
                    2
                ],
                "value": "42"
            }
        ]
    },
    "var p1;/* block comment 1 */ /* block comment 2 */": {
        "range": [
            0,
            7
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 0
            },
            "end": {
                "line": 1,
                "column": 7
            }
        },
        "type": "Program",
        "body": [
            {
                "range": [
                    0,
                    7
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 7
                    }
                },
                "type": "VariableDeclaration",
                "declarations": [
                    {
                        "range": [
                            4,
                            6
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 4
                            },
                            "end": {
                                "line": 1,
                                "column": 6
                            }
                        },
                        "type": "VariableDeclarator",
                        "id": {
                            "range": [
                                4,
                                6
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 4
                                },
                                "end": {
                                    "line": 1,
                                    "column": 6
                                }
                            },
                            "type": "Identifier",
                            "name": "p1"
                        },
                        "init": null
                    }
                ],
                "kind": "var",
                "trailingComments": [
                    {
                        "range": [
                            7,
                            28
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 7
                            },
                            "end": {
                                "line": 1,
                                "column": 28
                            }
                        },
                        "type": "Block",
                        "value": " block comment 1 "
                    },
                    {
                        "range": [
                            29,
                            50
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 29
                            },
                            "end": {
                                "line": 1,
                                "column": 50
                            }
                        },
                        "type": "Block",
                        "value": " block comment 2 "
                    }
                ]
            }
        ],
        "comments": [
            {
                "range": [
                    7,
                    28
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 7
                    },
                    "end": {
                        "line": 1,
                        "column": 28
                    }
                },
                "type": "Block",
                "value": " block comment 1 "
            },
            {
                "range": [
                    29,
                    50
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 29
                    },
                    "end": {
                        "line": 1,
                        "column": 50
                    }
                },
                "type": "Block",
                "value": " block comment 2 "
            }
        ],
        "tokens": [
            {
                "range": [
                    0,
                    3
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 3
                    }
                },
                "type": "Keyword",
                "value": "var"
            },
            {
                "range": [
                    4,
                    6
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 4
                    },
                    "end": {
                        "line": 1,
                        "column": 6
                    }
                },
                "type": "Identifier",
                "value": "p1"
            },
            {
                "range": [
                    6,
                    7
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 6
                    },
                    "end": {
                        "line": 1,
                        "column": 7
                    }
                },
                "type": "Punctuator",
                "value": ";"
            }
        ]
    },
    "/*42*/": {
        "range": [
            6,
            6
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 6
            },
            "end": {
                "line": 1,
                "column": 6
            }
        },
        "type": "Program",
        "body": [],
        "leadingComments": [
            {
                "range": [
                    0,
                    6
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 6
                    }
                },
                "type": "Block",
                "value": "42"
            }
        ],
        "comments": [
            {
                "range": [
                    0,
                    6
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 6
                    }
                },
                "type": "Block",
                "value": "42"
            }
        ],
        "tokens": []
    },
    "(a + /* assignmenr */b ) * c": {
        "type": "Program",
        "body": [
            {
                "type": "ExpressionStatement",
                "expression": {
                    "type": "BinaryExpression",
                    "operator": "*",
                    "left": {
                        "type": "BinaryExpression",
                        "operator": "+",
                        "left": {
                            "type": "Identifier",
                            "name": "a",
                            "range": [
                                1,
                                2
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 1
                                },
                                "end": {
                                    "line": 1,
                                    "column": 2
                                }
                            }
                        },
                        "right": {
                            "type": "Identifier",
                            "name": "b",
                            "range": [
                                21,
                                22
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 21
                                },
                                "end": {
                                    "line": 1,
                                    "column": 22
                                }
                            },
                            "leadingComments": [
                                {
                                    "type": "Block",
                                    "value": " assignmenr ",
                                    "range": [
                                        5,
                                        21
                                    ],
                                    "loc": {
                                        "start": {
                                            "line": 1,
                                            "column": 5
                                        },
                                        "end": {
                                            "line": 1,
                                            "column": 21
                                        }
                                    }
                                }
                            ]
                        },
                        "range": [
                            1,
                            22
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 1
                            },
                            "end": {
                                "line": 1,
                                "column": 22
                            }
                        }
                    },
                    "right": {
                        "type": "Identifier",
                        "name": "c",
                        "range": [
                            27,
                            28
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 27
                            },
                            "end": {
                                "line": 1,
                                "column": 28
                            }
                        }
                    },
                    "range": [
                        0,
                        28
                    ],
                    "loc": {
                        "start": {
                            "line": 1,
                            "column": 0
                        },
                        "end": {
                            "line": 1,
                            "column": 28
                        }
                    }
                },
                "range": [
                    0,
                    28
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 28
                    }
                }
            }
        ],
        "range": [
            0,
            28
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 0
            },
            "end": {
                "line": 1,
                "column": 28
            }
        },
        "comments": [
            {
                "type": "Block",
                "value": " assignmenr ",
                "range": [
                    5,
                    21
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 5
                    },
                    "end": {
                        "line": 1,
                        "column": 21
                    }
                }
            }
        ]
    },
    "/* assignmenr */\n a = b": {
        "type": "Program",
        "body": [
            {
                "type": "ExpressionStatement",
                "expression": {
                    "type": "AssignmentExpression",
                    "operator": "=",
                    "left": {
                        "type": "Identifier",
                        "name": "a",
                        "range": [
                            18,
                            19
                        ],
                        "loc": {
                            "start": {
                                "line": 2,
                                "column": 1
                            },
                            "end": {
                                "line": 2,
                                "column": 2
                            }
                        }
                    },
                    "right": {
                        "type": "Identifier",
                        "name": "b",
                        "range": [
                            22,
                            23
                        ],
                        "loc": {
                            "start": {
                                "line": 2,
                                "column": 5
                            },
                            "end": {
                                "line": 2,
                                "column": 6
                            }
                        }
                    },
                    "range": [
                        18,
                        23
                    ],
                    "loc": {
                        "start": {
                            "line": 2,
                            "column": 1
                        },
                        "end": {
                            "line": 2,
                            "column": 6
                        }
                    }
                },
                "range": [
                    18,
                    23
                ],
                "loc": {
                    "start": {
                        "line": 2,
                        "column": 1
                    },
                    "end": {
                        "line": 2,
                        "column": 6
                    }
                },
                "leadingComments": [
                    {
                        "type": "Block",
                        "value": " assignmenr ",
                        "range": [
                            0,
                            16
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 0
                            },
                            "end": {
                                "line": 1,
                                "column": 16
                            }
                        }
                    }
                ]
            }
        ],
        "range": [
            18,
            23
        ],
        "loc": {
            "start": {
                "line": 2,
                "column": 1
            },
            "end": {
                "line": 2,
                "column": 6
            }
        },
        "comments": [
            {
                "type": "Block",
                "value": " assignmenr ",
                "range": [
                    0,
                    16
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 16
                    }
                }
            }
        ]
    },
    "42 /*The*/ /*Answer*/": {
        "type": "Program",
        "body": [
            {
                "type": "ExpressionStatement",
                "expression": {
                    "type": "Literal",
                    "value": 42,
                    "raw": "42",
                    "range": [
                        0,
                        2
                    ],
                    "loc": {
                        "start": {
                            "line": 1,
                            "column": 0
                        },
                        "end": {
                            "line": 1,
                            "column": 2
                        }
                    }
                },
                "range": [
                    0,
                    21
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 21
                    }
                }
            }
        ],
        "range": [
            0,
            21
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 0
            },
            "end": {
                "line": 1,
                "column": 21
            }
        },
        "comments": [
            {
                "type": "Block",
                "value": "The",
                "range": [
                    3,
                    10
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 3
                    },
                    "end": {
                        "line": 1,
                        "column": 10
                    }
                }
            },
            {
                "type": "Block",
                "value": "Answer",
                "range": [
                    11,
                    21
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 11
                    },
                    "end": {
                        "line": 1,
                        "column": 21
                    }
                }
            }
        ]
    },
    "42 /*the*/ /*answer*/": {
        "type": "Program",
        "body": [
            {
                "type": "ExpressionStatement",
                "expression": {
                    "type": "Literal",
                    "value": 42,
                    "raw": "42",
                    "range": [
                        0,
                        2
                    ]
                },
                "range": [
                    0,
                    21
                ]
            }
        ],
        "range": [
            0,
            21
        ],
        "comments": [
            {
                "type": "Block",
                "value": "the",
                "range": [
                    3,
                    10
                ]
            },
            {
                "type": "Block",
                "value": "answer",
                "range": [
                    11,
                    21
                ]
            }
        ]
    },
    "42 /* the * answer */": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "Literal",
            "value": 42,
            "raw": "42",
            "range": [
                0,
                2
            ],
            "loc": {
                "start": {
                    "line": 1,
                    "column": 0
                },
                "end": {
                    "line": 1,
                    "column": 2
                }
            }
        },
        "range": [
            0,
            21
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 0
            },
            "end": {
                "line": 1,
                "column": 21
            }
        }
    },
    "42 /* The * answer */": {
        "type": "Program",
        "body": [
            {
                "type": "ExpressionStatement",
                "expression": {
                    "type": "Literal",
                    "value": 42,
                    "raw": "42",
                    "range": [
                        0,
                        2
                    ],
                    "loc": {
                        "start": {
                            "line": 1,
                            "column": 0
                        },
                        "end": {
                            "line": 1,
                            "column": 2
                        }
                    }
                },
                "range": [
                    0,
                    21
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 21
                    }
                }
            }
        ],
        "range": [
            0,
            21
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 0
            },
            "end": {
                "line": 1,
                "column": 21
            }
        },
        "comments": [
            {
                "type": "Block",
                "value": " The * answer ",
                "range": [
                    3,
                    21
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 3
                    },
                    "end": {
                        "line": 1,
                        "column": 21
                    }
                }
            }
        ]
    },
    "/* multiline\ncomment\nshould\nbe\nignored */ 42": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "Literal",
            "value": 42,
            "raw": "42",
            "range": [
                42,
                44
            ],
            "loc": {
                "start": {
                    "line": 5,
                    "column": 11
                },
                "end": {
                    "line": 5,
                    "column": 13
                }
            }
        },
        "range": [
            42,
            44
        ],
        "loc": {
            "start": {
                "line": 5,
                "column": 11
            },
            "end": {
                "line": 5,
                "column": 13
            }
        }
    },
    "/*a\r\nb*/ 42": {
        "type": "Program",
        "body": [
            {
                "type": "ExpressionStatement",
                "expression": {
                    "type": "Literal",
                    "value": 42,
                    "raw": "42",
                    "range": [
                        9,
                        11
                    ],
                    "loc": {
                        "start": {
                            "line": 2,
                            "column": 4
                        },
                        "end": {
                            "line": 2,
                            "column": 6
                        }
                    }
                },
                "range": [
                    9,
                    11
                ],
                "loc": {
                    "start": {
                        "line": 2,
                        "column": 4
                    },
                    "end": {
                        "line": 2,
                        "column": 6
                    }
                },
                "leadingComments": [
                    {
                        "type": "Block",
                        "value": "a\r\nb",
                        "range": [
                            0,
                            8
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 0
                            },
                            "end": {
                                "line": 2,
                                "column": 3
                            }
                        }
                    }
                ]
            }
        ],
        "range": [
            9,
            11
        ],
        "loc": {
            "start": {
                "line": 2,
                "column": 4
            },
            "end": {
                "line": 2,
                "column": 6
            }
        },
        "comments": [
            {
                "type": "Block",
                "value": "a\r\nb",
                "range": [
                    0,
                    8
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 2,
                        "column": 3
                    }
                }
            }
        ]
    },
    "/*a\rb*/ 42": {
        "type": "Program",
        "body": [
            {
                "type": "ExpressionStatement",
                "expression": {
                    "type": "Literal",
                    "value": 42,
                    "raw": "42",
                    "range": [
                        8,
                        10
                    ],
                    "loc": {
                        "start": {
                            "line": 2,
                            "column": 4
                        },
                        "end": {
                            "line": 2,
                            "column": 6
                        }
                    }
                },
                "range": [
                    8,
                    10
                ],
                "loc": {
                    "start": {
                        "line": 2,
                        "column": 4
                    },
                    "end": {
                        "line": 2,
                        "column": 6
                    }
                }
            }
        ],
        "range": [
            8,
            10
        ],
        "loc": {
            "start": {
                "line": 2,
                "column": 4
            },
            "end": {
                "line": 2,
                "column": 6
            }
        },
        "comments": [
            {
                "type": "Block",
                "value": "a\rb",
                "range": [
                    0,
                    7
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 2,
                        "column": 3
                    }
                }
            }
        ]
    },
    "/*a\nb*/ 42": {
        "type": "Program",
        "body": [
            {
                "type": "ExpressionStatement",
                "expression": {
                    "type": "Literal",
                    "value": 42,
                    "raw": "42",
                    "range": [
                        8,
                        10
                    ],
                    "loc": {
                        "start": {
                            "line": 2,
                            "column": 4
                        },
                        "end": {
                            "line": 2,
                            "column": 6
                        }
                    }
                },
                "range": [
                    8,
                    10
                ],
                "loc": {
                    "start": {
                        "line": 2,
                        "column": 4
                    },
                    "end": {
                        "line": 2,
                        "column": 6
                    }
                },
                "leadingComments": [
                    {
                        "type": "Block",
                        "value": "a\nb",
                        "range": [
                            0,
                            7
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 0
                            },
                            "end": {
                                "line": 2,
                                "column": 3
                            }
                        }
                    }
                ]
            }
        ],
        "range": [
            8,
            10
        ],
        "loc": {
            "start": {
                "line": 2,
                "column": 4
            },
            "end": {
                "line": 2,
                "column": 6
            }
        },
        "comments": [
            {
                "type": "Block",
                "value": "a\nb",
                "range": [
                    0,
                    7
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 2,
                        "column": 3
                    }
                }
            }
        ]
    },
    "/*a\nc*/ 42": {
        "type": "Program",
        "body": [
            {
                "type": "ExpressionStatement",
                "expression": {
                    "type": "Literal",
                    "value": 42,
                    "raw": "42",
                    "range": [
                        8,
                        10
                    ],
                    "loc": {
                        "start": {
                            "line": 2,
                            "column": 4
                        },
                        "end": {
                            "line": 2,
                            "column": 6
                        }
                    }
                },
                "range": [
                    8,
                    10
                ],
                "loc": {
                    "start": {
                        "line": 2,
                        "column": 4
                    },
                    "end": {
                        "line": 2,
                        "column": 6
                    }
                },
                "leadingComments": [
                    {
                        "type": "Block",
                        "value": "a\nc",
                        "range": [
                            0,
                            7
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 0
                            },
                            "end": {
                                "line": 2,
                                "column": 3
                            }
                        }
                    }
                ]
            }
        ],
        "range": [
            8,
            10
        ],
        "loc": {
            "start": {
                "line": 2,
                "column": 4
            },
            "end": {
                "line": 2,
                "column": 6
            }
        },
        "comments": [
            {
                "type": "Block",
                "value": "a\nc",
                "range": [
                    0,
                    7
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 2,
                        "column": 3
                    }
                }
            }
        ]
    },
    "// one\\n": {
        "type": "Program",
        "body": [],
        "range": [
            8,
            8
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 8
            },
            "end": {
                "line": 1,
                "column": 8
            }
        },
        "leadingComments": [
            {
                "type": "Line",
                "value": " one\\n",
                "range": [
                    0,
                    8
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 8
                    }
                }
            }
        ],
        "comments": [
            {
                "type": "Line",
                "value": " one\\n",
                "range": [
                    0,
                    8
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 8
                    }
                }
            }
        ]
    },
    "// line comment\n42": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "Literal",
            "value": 42,
            "raw": "42",
            "range": [
                16,
                18
            ],
            "loc": {
                "start": {
                    "line": 2,
                    "column": 0
                },
                "end": {
                    "line": 2,
                    "column": 2
                }
            }
        },
        "range": [
            16,
            18
        ],
        "loc": {
            "start": {
                "line": 2,
                "column": 0
            },
            "end": {
                "line": 2,
                "column": 2
            }
        }
    },
    "42 // line comment": {
        "type": "Program",
        "body": [
            {
                "type": "ExpressionStatement",
                "expression": {
                    "type": "Literal",
                    "value": 42,
                    "raw": "42",
                    "range": [
                        0,
                        2
                    ],
                    "loc": {
                        "start": {
                            "line": 1,
                            "column": 0
                        },
                        "end": {
                            "line": 1,
                            "column": 2
                        }
                    },
                    "trailingComments": [
                        {
                            "type": "Line",
                            "value": " line comment",
                            "range": [
                                3,
                                18
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 3
                                },
                                "end": {
                                    "line": 1,
                                    "column": 18
                                }
                            }
                        }
                    ]
                },
                "range": [
                    0,
                    18
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 18
                    }
                }
            }
        ],
        "range": [
            0,
            18
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 0
            },
            "end": {
                "line": 1,
                "column": 18
            }
        },
        "comments": [
            {
                "type": "Line",
                "value": " line comment",
                "range": [
                    3,
                    18
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 3
                    },
                    "end": {
                        "line": 1,
                        "column": 18
                    }
                }
            }
        ]
    },
    "// Hello, world!\n42": {
        "type": "Program",
        "body": [
            {
                "type": "ExpressionStatement",
                "expression": {
                    "type": "Literal",
                    "value": 42,
                    "raw": "42",
                    "range": [
                        17,
                        19
                    ],
                    "loc": {
                        "start": {
                            "line": 2,
                            "column": 0
                        },
                        "end": {
                            "line": 2,
                            "column": 2
                        }
                    }
                },
                "range": [
                    17,
                    19
                ],
                "loc": {
                    "start": {
                        "line": 2,
                        "column": 0
                    },
                    "end": {
                        "line": 2,
                        "column": 2
                    }
                },
                "leadingComments": [
                    {
                        "type": "Line",
                        "value": " Hello, world!",
                        "range": [
                            0,
                            16
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 0
                            },
                            "end": {
                                "line": 1,
                                "column": 16
                            }
                        }
                    }
                ]
            }
        ],
        "range": [
            17,
            19
        ],
        "loc": {
            "start": {
                "line": 2,
                "column": 0
            },
            "end": {
                "line": 2,
                "column": 2
            }
        },
        "comments": [
            {
                "type": "Line",
                "value": " Hello, world!",
                "range": [
                    0,
                    16
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 16
                    }
                }
            }
        ]
    },
    "// Hello, world!\n": {
        "type": "Program",
        "body": [],
        "range": [
            17,
            17
        ],
        "loc": {
            "start": {
                "line": 2,
                "column": 0
            },
            "end": {
                "line": 2,
                "column": 0
            }
        },
        "comments": [
            {
                "type": "Line",
                "value": " Hello, world!",
                "range": [
                    0,
                    16
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 16
                    }
                }
            }
        ]
    },
    "// Hallo, world!\n": {
        "type": "Program",
        "body": [],
        "loc": {
            "start": {
                "line": 2,
                "column": 0
            },
            "end": {
                "line": 2,
                "column": 0
            }
        },
        "comments": [
            {
                "type": "Line",
                "value": " Hallo, world!",
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 16
                    }
                }
            }
        ]
    },
    "//\n42": {
        "type": "Program",
        "body": [
            {
                "type": "ExpressionStatement",
                "expression": {
                    "type": "Literal",
                    "value": 42,
                    "raw": "42",
                    "range": [
                        3,
                        5
                    ],
                    "loc": {
                        "start": {
                            "line": 2,
                            "column": 0
                        },
                        "end": {
                            "line": 2,
                            "column": 2
                        }
                    }
                },
                "range": [
                    3,
                    5
                ],
                "loc": {
                    "start": {
                        "line": 2,
                        "column": 0
                    },
                    "end": {
                        "line": 2,
                        "column": 2
                    }
                },
                "leadingComments": [
                    {
                        "type": "Line",
                        "value": "",
                        "range": [
                            0,
                            2
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 0
                            },
                            "end": {
                                "line": 1,
                                "column": 2
                            }
                        }
                    }
                ]
            }
        ],
        "range": [
            3,
            5
        ],
        "loc": {
            "start": {
                "line": 2,
                "column": 0
            },
            "end": {
                "line": 2,
                "column": 2
            }
        },
        "comments": [
            {
                "type": "Line",
                "value": "",
                "range": [
                    0,
                    2
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 2
                    }
                }
            }
        ]
    },
    "//": {
        "type": "Program",
        "body": [],
        "range": [
            2,
            2
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 2
            },
            "end": {
                "line": 1,
                "column": 2
            }
        },
        "comments": [
            {
                "type": "Line",
                "value": "",
                "range": [
                    0,
                    2
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 2
                    }
                }
            }
        ]
    },
    "// ": {
        "type": "Program",
        "body": [],
        "range": [
            3,
            3
        ],
        "comments": [
            {
                "type": "Line",
                "value": " ",
                "range": [
                    0,
                    3
                ]
            }
        ]
    },
    "/**/42": {
        "type": "Program",
        "body": [
            {
                "type": "ExpressionStatement",
                "expression": {
                    "type": "Literal",
                    "value": 42,
                    "raw": "42",
                    "range": [
                        4,
                        6
                    ],
                    "loc": {
                        "start": {
                            "line": 1,
                            "column": 4
                        },
                        "end": {
                            "line": 1,
                            "column": 6
                        }
                    }
                },
                "range": [
                    4,
                    6
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 4
                    },
                    "end": {
                        "line": 1,
                        "column": 6
                    }
                },
                "leadingComments": [
                    {
                        "type": "Block",
                        "value": "",
                        "range": [
                            0,
                            4
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 0
                            },
                            "end": {
                                "line": 1,
                                "column": 4
                            }
                        }
                    }
                ]
            }
        ],
        "range": [
            4,
            6
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 4
            },
            "end": {
                "line": 1,
                "column": 6
            }
        },
        "comments": [
            {
                "type": "Block",
                "value": "",
                "range": [
                    0,
                    4
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 4
                    }
                }
            }
        ]
    },
    "42/**/": {
        "type": "Program",
        "body": [
            {
                "type": "ExpressionStatement",
                "expression": {
                    "type": "Literal",
                    "value": 42,
                    "raw": "42",
                    "range": [
                        0,
                        2
                    ],
                    "loc": {
                        "start": {
                            "line": 1,
                            "column": 0
                        },
                        "end": {
                            "line": 1,
                            "column": 2
                        }
                    },
                    "trailingComments": [
                        {
                            "type": "Block",
                            "value": "",
                            "range": [
                                2,
                                6
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 2
                                },
                                "end": {
                                    "line": 1,
                                    "column": 6
                                }
                            }
                        }
                    ]
                },
                "range": [
                    0,
                    6
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 6
                    }
                }
            }
        ],
        "range": [
            0,
            6
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 0
            },
            "end": {
                "line": 1,
                "column": 6
            }
        },
        "comments": [
            {
                "type": "Block",
                "value": "",
                "range": [
                    2,
                    6
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 2
                    },
                    "end": {
                        "line": 1,
                        "column": 6
                    }
                }
            }
        ]
    },
    "// Hello, world!\n\n// Another hello\n42": {
        "type": "Program",
        "body": [
            {
                "type": "ExpressionStatement",
                "expression": {
                    "type": "Literal",
                    "value": 42,
                    "raw": "42",
                    "range": [
                        37,
                        39
                    ],
                    "loc": {
                        "start": {
                            "line": 4,
                            "column": 0
                        },
                        "end": {
                            "line": 4,
                            "column": 2
                        }
                    }
                },
                "range": [
                    37,
                    39
                ],
                "loc": {
                    "start": {
                        "line": 4,
                        "column": 0
                    },
                    "end": {
                        "line": 4,
                        "column": 2
                    }
                },
                "leadingComments": [
                    {
                        "type": "Line",
                        "value": " Hello, world!",
                        "range": [
                            0,
                            16
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 0
                            },
                            "end": {
                                "line": 1,
                                "column": 16
                            }
                        }
                    },
                    {
                        "type": "Line",
                        "value": " Another hello",
                        "range": [
                            18,
                            36
                        ],
                        "loc": {
                            "start": {
                                "line": 3,
                                "column": 0
                            },
                            "end": {
                                "line": 3,
                                "column": 18
                            }
                        }
                    }
                ]
            }
        ],
        "range": [
            37,
            39
        ],
        "loc": {
            "start": {
                "line": 4,
                "column": 0
            },
            "end": {
                "line": 4,
                "column": 2
            }
        },
        "comments": [
            {
                "type": "Line",
                "value": " Hello, world!",
                "range": [
                    0,
                    16
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 16
                    }
                }
            },
            {
                "type": "Line",
                "value": " Another hello",
                "range": [
                    18,
                    36
                ],
                "loc": {
                    "start": {
                        "line": 3,
                        "column": 0
                    },
                    "end": {
                        "line": 3,
                        "column": 18
                    }
                }
            }
        ]
    },
    "if (x) { doThat() // Some comment\n }": {
        "type": "Program",
        "body": [
            {
                "type": "IfStatement",
                "test": {
                    "type": "Identifier",
                    "name": "x",
                    "range": [
                        4,
                        5
                    ],
                    "loc": {
                        "start": {
                            "line": 1,
                            "column": 4
                        },
                        "end": {
                            "line": 1,
                            "column": 5
                        }
                    }
                },
                "consequent": {
                    "type": "BlockStatement",
                    "body": [
                        {
                            "type": "ExpressionStatement",
                            "expression": {
                                "type": "CallExpression",
                                "callee": {
                                    "type": "Identifier",
                                    "name": "doThat",
                                    "range": [
                                        9,
                                        15
                                    ],
                                    "loc": {
                                        "start": {
                                            "line": 1,
                                            "column": 9
                                        },
                                        "end": {
                                            "line": 1,
                                            "column": 15
                                        }
                                    }
                                },
                                "arguments": [],
                                "range": [
                                    9,
                                    17
                                ],
                                "loc": {
                                    "start": {
                                        "line": 1,
                                        "column": 9
                                    },
                                    "end": {
                                        "line": 1,
                                        "column": 17
                                    }
                                },
                                "trailingComments": [
                                    {
                                        "type": "Line",
                                        "value": " Some comment",
                                        "range": [
                                            18,
                                            33
                                        ],
                                        "loc": {
                                            "start": {
                                                "line": 1,
                                                "column": 18
                                            },
                                            "end": {
                                                "line": 1,
                                                "column": 33
                                            }
                                        }
                                    }
                                ]
                            },
                            "range": [
                                9,
                                35
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 9
                                },
                                "end": {
                                    "line": 2,
                                    "column": 1
                                }
                            }
                        }
                    ],
                    "range": [
                        7,
                        36
                    ],
                    "loc": {
                        "start": {
                            "line": 1,
                            "column": 7
                        },
                        "end": {
                            "line": 2,
                            "column": 2
                        }
                    }
                },
                "alternate": null,
                "range": [
                    0,
                    36
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 2,
                        "column": 2
                    }
                }
            }
        ],
        "range": [
            0,
            36
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 0
            },
            "end": {
                "line": 2,
                "column": 2
            }
        },
        "comments": [
            {
                "type": "Line",
                "value": " Some comment",
                "range": [
                    18,
                    33
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 18
                    },
                    "end": {
                        "line": 1,
                        "column": 33
                    }
                }
            }
        ]
    },
    "if (x) { // Some comment\ndoThat(); }": {
        "type": "Program",
        "body": [
            {
                "type": "IfStatement",
                "test": {
                    "type": "Identifier",
                    "name": "x",
                    "range": [
                        4,
                        5
                    ],
                    "loc": {
                        "start": {
                            "line": 1,
                            "column": 4
                        },
                        "end": {
                            "line": 1,
                            "column": 5
                        }
                    }
                },
                "consequent": {
                    "type": "BlockStatement",
                    "body": [
                        {
                            "type": "ExpressionStatement",
                            "expression": {
                                "type": "CallExpression",
                                "callee": {
                                    "type": "Identifier",
                                    "name": "doThat",
                                    "range": [
                                        25,
                                        31
                                    ],
                                    "loc": {
                                        "start": {
                                            "line": 2,
                                            "column": 0
                                        },
                                        "end": {
                                            "line": 2,
                                            "column": 6
                                        }
                                    }
                                },
                                "arguments": [],
                                "range": [
                                    25,
                                    33
                                ],
                                "loc": {
                                    "start": {
                                        "line": 2,
                                        "column": 0
                                    },
                                    "end": {
                                        "line": 2,
                                        "column": 8
                                    }
                                }
                            },
                            "range": [
                                25,
                                34
                            ],
                            "loc": {
                                "start": {
                                    "line": 2,
                                    "column": 0
                                },
                                "end": {
                                    "line": 2,
                                    "column": 9
                                }
                            },
                            "leadingComments": [
                                {
                                    "type": "Line",
                                    "value": " Some comment",
                                    "range": [
                                        9,
                                        24
                                    ],
                                    "loc": {
                                        "start": {
                                            "line": 1,
                                            "column": 9
                                        },
                                        "end": {
                                            "line": 1,
                                            "column": 24
                                        }
                                    }
                                }
                            ]
                        }
                    ],
                    "range": [
                        7,
                        36
                    ],
                    "loc": {
                        "start": {
                            "line": 1,
                            "column": 7
                        },
                        "end": {
                            "line": 2,
                            "column": 11
                        }
                    }
                },
                "alternate": null,
                "range": [
                    0,
                    36
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 2,
                        "column": 11
                    }
                }
            }
        ],
        "range": [
            0,
            36
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 0
            },
            "end": {
                "line": 2,
                "column": 11
            }
        },
        "comments": [
            {
                "type": "Line",
                "value": " Some comment",
                "range": [
                    9,
                    24
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 9
                    },
                    "end": {
                        "line": 1,
                        "column": 24
                    }
                }
            }
        ]
    },
    "if (x) { /* Some comment */ doThat() }": {
        "type": "Program",
        "body": [
            {
                "type": "IfStatement",
                "test": {
                    "type": "Identifier",
                    "name": "x",
                    "range": [
                        4,
                        5
                    ],
                    "loc": {
                        "start": {
                            "line": 1,
                            "column": 4
                        },
                        "end": {
                            "line": 1,
                            "column": 5
                        }
                    }
                },
                "consequent": {
                    "type": "BlockStatement",
                    "body": [
                        {
                            "type": "ExpressionStatement",
                            "expression": {
                                "type": "CallExpression",
                                "callee": {
                                    "type": "Identifier",
                                    "name": "doThat",
                                    "range": [
                                        28,
                                        34
                                    ],
                                    "loc": {
                                        "start": {
                                            "line": 1,
                                            "column": 28
                                        },
                                        "end": {
                                            "line": 1,
                                            "column": 34
                                        }
                                    }
                                },
                                "arguments": [],
                                "range": [
                                    28,
                                    36
                                ],
                                "loc": {
                                    "start": {
                                        "line": 1,
                                        "column": 28
                                    },
                                    "end": {
                                        "line": 1,
                                        "column": 36
                                    }
                                }
                            },
                            "range": [
                                28,
                                37
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 28
                                },
                                "end": {
                                    "line": 1,
                                    "column": 37
                                }
                            },
                            "leadingComments": [
                                {
                                    "type": "Block",
                                    "value": " Some comment ",
                                    "range": [
                                        9,
                                        27
                                    ],
                                    "loc": {
                                        "start": {
                                            "line": 1,
                                            "column": 9
                                        },
                                        "end": {
                                            "line": 1,
                                            "column": 27
                                        }
                                    }
                                }
                            ]
                        }
                    ],
                    "range": [
                        7,
                        38
                    ],
                    "loc": {
                        "start": {
                            "line": 1,
                            "column": 7
                        },
                        "end": {
                            "line": 1,
                            "column": 38
                        }
                    }
                },
                "alternate": null,
                "range": [
                    0,
                    38
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 38
                    }
                }
            }
        ],
        "range": [
            0,
            38
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 0
            },
            "end": {
                "line": 1,
                "column": 38
            }
        },
        "comments": [
            {
                "type": "Block",
                "value": " Some comment ",
                "range": [
                    9,
                    27
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 9
                    },
                    "end": {
                        "line": 1,
                        "column": 27
                    }
                }
            }
        ]
    },
    "if (x) { doThat() /* Some comment */ }": {
        "type": "Program",
        "body": [
            {
                "type": "IfStatement",
                "test": {
                    "type": "Identifier",
                    "name": "x",
                    "range": [
                        4,
                        5
                    ],
                    "loc": {
                        "start": {
                            "line": 1,
                            "column": 4
                        },
                        "end": {
                            "line": 1,
                            "column": 5
                        }
                    }
                },
                "consequent": {
                    "type": "BlockStatement",
                    "body": [
                        {
                            "type": "ExpressionStatement",
                            "expression": {
                                "type": "CallExpression",
                                "callee": {
                                    "type": "Identifier",
                                    "name": "doThat",
                                    "range": [
                                        9,
                                        15
                                    ],
                                    "loc": {
                                        "start": {
                                            "line": 1,
                                            "column": 9
                                        },
                                        "end": {
                                            "line": 1,
                                            "column": 15
                                        }
                                    }
                                },
                                "arguments": [],
                                "range": [
                                    9,
                                    17
                                ],
                                "loc": {
                                    "start": {
                                        "line": 1,
                                        "column": 9
                                    },
                                    "end": {
                                        "line": 1,
                                        "column": 17
                                    }
                                },
                                "trailingComments": [
                                    {
                                        "type": "Block",
                                        "value": " Some comment ",
                                        "range": [
                                            18,
                                            36
                                        ],
                                        "loc": {
                                            "start": {
                                                "line": 1,
                                                "column": 18
                                            },
                                            "end": {
                                                "line": 1,
                                                "column": 36
                                            }
                                        }
                                    }
                                ]
                            },
                            "range": [
                                9,
                                37
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 9
                                },
                                "end": {
                                    "line": 1,
                                    "column": 37
                                }
                            }
                        }
                    ],
                    "range": [
                        7,
                        38
                    ],
                    "loc": {
                        "start": {
                            "line": 1,
                            "column": 7
                        },
                        "end": {
                            "line": 1,
                            "column": 38
                        }
                    }
                },
                "alternate": null,
                "range": [
                    0,
                    38
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 38
                    }
                }
            }
        ],
        "range": [
            0,
            38
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 0
            },
            "end": {
                "line": 1,
                "column": 38
            }
        },
        "comments": [
            {
                "type": "Block",
                "value": " Some comment ",
                "range": [
                    18,
                    36
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 18
                    },
                    "end": {
                        "line": 1,
                        "column": 36
                    }
                }
            }
        ]
    },
    "switch (answer) { case 42: /* perfect */ bingo() }": {
        "type": "Program",
        "body": [
            {
                "type": "SwitchStatement",
                "discriminant": {
                    "type": "Identifier",
                    "name": "answer",
                    "range": [
                        8,
                        14
                    ],
                    "loc": {
                        "start": {
                            "line": 1,
                            "column": 8
                        },
                        "end": {
                            "line": 1,
                            "column": 14
                        }
                    }
                },
                "cases": [
                    {
                        "type": "SwitchCase",
                        "test": {
                            "type": "Literal",
                            "value": 42,
                            "raw": "42",
                            "range": [
                                23,
                                25
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 23
                                },
                                "end": {
                                    "line": 1,
                                    "column": 25
                                }
                            }
                        },
                        "consequent": [
                            {
                                "type": "ExpressionStatement",
                                "expression": {
                                    "type": "CallExpression",
                                    "callee": {
                                        "type": "Identifier",
                                        "name": "bingo",
                                        "range": [
                                            41,
                                            46
                                        ],
                                        "loc": {
                                            "start": {
                                                "line": 1,
                                                "column": 41
                                            },
                                            "end": {
                                                "line": 1,
                                                "column": 46
                                            }
                                        }
                                    },
                                    "arguments": [],
                                    "range": [
                                        41,
                                        48
                                    ],
                                    "loc": {
                                        "start": {
                                            "line": 1,
                                            "column": 41
                                        },
                                        "end": {
                                            "line": 1,
                                            "column": 48
                                        }
                                    }
                                },
                                "range": [
                                    41,
                                    49
                                ],
                                "loc": {
                                    "start": {
                                        "line": 1,
                                        "column": 41
                                    },
                                    "end": {
                                        "line": 1,
                                        "column": 49
                                    }
                                },
                                "leadingComments": [
                                    {
                                        "type": "Block",
                                        "value": " perfect ",
                                        "range": [
                                            27,
                                            40
                                        ],
                                        "loc": {
                                            "start": {
                                                "line": 1,
                                                "column": 27
                                            },
                                            "end": {
                                                "line": 1,
                                                "column": 40
                                            }
                                        }
                                    }
                                ]
                            }
                        ],
                        "range": [
                            18,
                            49
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 18
                            },
                            "end": {
                                "line": 1,
                                "column": 49
                            }
                        }
                    }
                ],
                "range": [
                    0,
                    50
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 50
                    }
                }
            }
        ],
        "range": [
            0,
            50
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 0
            },
            "end": {
                "line": 1,
                "column": 50
            }
        },
        "comments": [
            {
                "type": "Block",
                "value": " perfect ",
                "range": [
                    27,
                    40
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 27
                    },
                    "end": {
                        "line": 1,
                        "column": 40
                    }
                }
            }
        ]
    },
    "switch (answer) { case 42: bingo() /* perfect */ }": {
        "type": "Program",
        "body": [
            {
                "type": "SwitchStatement",
                "discriminant": {
                    "type": "Identifier",
                    "name": "answer",
                    "range": [
                        8,
                        14
                    ],
                    "loc": {
                        "start": {
                            "line": 1,
                            "column": 8
                        },
                        "end": {
                            "line": 1,
                            "column": 14
                        }
                    }
                },
                "cases": [
                    {
                        "type": "SwitchCase",
                        "test": {
                            "type": "Literal",
                            "value": 42,
                            "raw": "42",
                            "range": [
                                23,
                                25
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 23
                                },
                                "end": {
                                    "line": 1,
                                    "column": 25
                                }
                            }
                        },
                        "consequent": [
                            {
                                "type": "ExpressionStatement",
                                "expression": {
                                    "type": "CallExpression",
                                    "callee": {
                                        "type": "Identifier",
                                        "name": "bingo",
                                        "range": [
                                            27,
                                            32
                                        ],
                                        "loc": {
                                            "start": {
                                                "line": 1,
                                                "column": 27
                                            },
                                            "end": {
                                                "line": 1,
                                                "column": 32
                                            }
                                        }
                                    },
                                    "arguments": [],
                                    "range": [
                                        27,
                                        34
                                    ],
                                    "loc": {
                                        "start": {
                                            "line": 1,
                                            "column": 27
                                        },
                                        "end": {
                                            "line": 1,
                                            "column": 34
                                        }
                                    },
                                    "trailingComments": [
                                        {
                                            "type": "Block",
                                            "value": " perfect ",
                                            "range": [
                                                35,
                                                48
                                            ],
                                            "loc": {
                                                "start": {
                                                    "line": 1,
                                                    "column": 35
                                                },
                                                "end": {
                                                    "line": 1,
                                                    "column": 48
                                                }
                                            }
                                        }
                                    ]
                                },
                                "range": [
                                    27,
                                    49
                                ],
                                "loc": {
                                    "start": {
                                        "line": 1,
                                        "column": 27
                                    },
                                    "end": {
                                        "line": 1,
                                        "column": 49
                                    }
                                }
                            }
                        ],
                        "range": [
                            18,
                            49
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 18
                            },
                            "end": {
                                "line": 1,
                                "column": 49
                            }
                        }
                    }
                ],
                "range": [
                    0,
                    50
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 50
                    }
                }
            }
        ],
        "range": [
            0,
            50
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 0
            },
            "end": {
                "line": 1,
                "column": 50
            }
        },
        "comments": [
            {
                "type": "Block",
                "value": " perfect ",
                "range": [
                    35,
                    48
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 35
                    },
                    "end": {
                        "line": 1,
                        "column": 48
                    }
                }
            }
        ]
    },
    "/* header */ (function(){ var version = 1; }).call(this)": {
        "type": "Program",
        "body": [
            {
                "type": "ExpressionStatement",
                "expression": {
                    "type": "CallExpression",
                    "callee": {
                        "type": "MemberExpression",
                        "computed": false,
                        "object": {
                            "type": "FunctionExpression",
                            "id": null,
                            "params": [],
                            "defaults": [],
                            "body": {
                                "type": "BlockStatement",
                                "body": [
                                    {
                                        "type": "VariableDeclaration",
                                        "declarations": [
                                            {
                                                "type": "VariableDeclarator",
                                                "id": {
                                                    "type": "Identifier",
                                                    "name": "version",
                                                    "range": [
                                                        30,
                                                        37
                                                    ],
                                                    "loc": {
                                                        "start": {
                                                            "line": 1,
                                                            "column": 30
                                                        },
                                                        "end": {
                                                            "line": 1,
                                                            "column": 37
                                                        }
                                                    }
                                                },
                                                "init": {
                                                    "type": "Literal",
                                                    "value": 1,
                                                    "raw": "1",
                                                    "range": [
                                                        40,
                                                        41
                                                    ],
                                                    "loc": {
                                                        "start": {
                                                            "line": 1,
                                                            "column": 40
                                                        },
                                                        "end": {
                                                            "line": 1,
                                                            "column": 41
                                                        }
                                                    }
                                                },
                                                "range": [
                                                    30,
                                                    41
                                                ],
                                                "loc": {
                                                    "start": {
                                                        "line": 1,
                                                        "column": 30
                                                    },
                                                    "end": {
                                                        "line": 1,
                                                        "column": 41
                                                    }
                                                }
                                            }
                                        ],
                                        "kind": "var",
                                        "range": [
                                            26,
                                            42
                                        ],
                                        "loc": {
                                            "start": {
                                                "line": 1,
                                                "column": 26
                                            },
                                            "end": {
                                                "line": 1,
                                                "column": 42
                                            }
                                        }
                                    }
                                ],
                                "range": [
                                    24,
                                    44
                                ],
                                "loc": {
                                    "start": {
                                        "line": 1,
                                        "column": 24
                                    },
                                    "end": {
                                        "line": 1,
                                        "column": 44
                                    }
                                }
                            },
                            "rest": null,
                            "generator": false,
                            "expression": false,
                            "range": [
                                14,
                                44
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 14
                                },
                                "end": {
                                    "line": 1,
                                    "column": 44
                                }
                            }
                        },
                        "property": {
                            "type": "Identifier",
                            "name": "call",
                            "range": [
                                46,
                                50
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 46
                                },
                                "end": {
                                    "line": 1,
                                    "column": 50
                                }
                            }
                        },
                        "range": [
                            13,
                            50
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 13
                            },
                            "end": {
                                "line": 1,
                                "column": 50
                            }
                        }
                    },
                    "arguments": [
                        {
                            "type": "ThisExpression",
                            "range": [
                                51,
                                55
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 51
                                },
                                "end": {
                                    "line": 1,
                                    "column": 55
                                }
                            }
                        }
                    ],
                    "range": [
                        13,
                        56
                    ],
                    "loc": {
                        "start": {
                            "line": 1,
                            "column": 13
                        },
                        "end": {
                            "line": 1,
                            "column": 56
                        }
                    }
                },
                "range": [
                    13,
                    56
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 13
                    },
                    "end": {
                        "line": 1,
                        "column": 56
                    }
                },
                "leadingComments": [
                    {
                        "type": "Block",
                        "value": " header ",
                        "range": [
                            0,
                            12
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 0
                            },
                            "end": {
                                "line": 1,
                                "column": 12
                            }
                        }
                    }
                ]
            }
        ],
        "range": [
            13,
            56
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 13
            },
            "end": {
                "line": 1,
                "column": 56
            }
        },
        "comments": [
            {
                "type": "Block",
                "value": " header ",
                "range": [
                    0,
                    12
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 12
                    }
                }
            }
        ]
    },
    "(function(){ var version = 1; /* sync */ }).call(this)": {
        "type": "Program",
        "body": [
            {
                "type": "ExpressionStatement",
                "expression": {
                    "type": "CallExpression",
                    "callee": {
                        "type": "MemberExpression",
                        "computed": false,
                        "object": {
                            "type": "FunctionExpression",
                            "id": null,
                            "params": [],
                            "defaults": [],
                            "body": {
                                "type": "BlockStatement",
                                "body": [
                                    {
                                        "type": "VariableDeclaration",
                                        "declarations": [
                                            {
                                                "type": "VariableDeclarator",
                                                "id": {
                                                    "type": "Identifier",
                                                    "name": "version",
                                                    "range": [
                                                        17,
                                                        24
                                                    ],
                                                    "loc": {
                                                        "start": {
                                                            "line": 1,
                                                            "column": 17
                                                        },
                                                        "end": {
                                                            "line": 1,
                                                            "column": 24
                                                        }
                                                    }
                                                },
                                                "init": {
                                                    "type": "Literal",
                                                    "value": 1,
                                                    "raw": "1",
                                                    "range": [
                                                        27,
                                                        28
                                                    ],
                                                    "loc": {
                                                        "start": {
                                                            "line": 1,
                                                            "column": 27
                                                        },
                                                        "end": {
                                                            "line": 1,
                                                            "column": 28
                                                        }
                                                    }
                                                },
                                                "range": [
                                                    17,
                                                    28
                                                ],
                                                "loc": {
                                                    "start": {
                                                        "line": 1,
                                                        "column": 17
                                                    },
                                                    "end": {
                                                        "line": 1,
                                                        "column": 28
                                                    }
                                                }
                                            }
                                        ],
                                        "kind": "var",
                                        "range": [
                                            13,
                                            29
                                        ],
                                        "loc": {
                                            "start": {
                                                "line": 1,
                                                "column": 13
                                            },
                                            "end": {
                                                "line": 1,
                                                "column": 29
                                            }
                                        },
                                        "trailingComments": [
                                            {
                                                "type": "Block",
                                                "value": " sync ",
                                                "range": [
                                                    30,
                                                    40
                                                ],
                                                "loc": {
                                                    "start": {
                                                        "line": 1,
                                                        "column": 30
                                                    },
                                                    "end": {
                                                        "line": 1,
                                                        "column": 40
                                                    }
                                                }
                                            }
                                        ]
                                    }
                                ],
                                "range": [
                                    11,
                                    42
                                ],
                                "loc": {
                                    "start": {
                                        "line": 1,
                                        "column": 11
                                    },
                                    "end": {
                                        "line": 1,
                                        "column": 42
                                    }
                                }
                            },
                            "rest": null,
                            "generator": false,
                            "expression": false,
                            "range": [
                                1,
                                42
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 1
                                },
                                "end": {
                                    "line": 1,
                                    "column": 42
                                }
                            }
                        },
                        "property": {
                            "type": "Identifier",
                            "name": "call",
                            "range": [
                                44,
                                48
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 44
                                },
                                "end": {
                                    "line": 1,
                                    "column": 48
                                }
                            },
                            "leadingComments": [
                                {
                                    "type": "Block",
                                    "value": " sync ",
                                    "range": [
                                        30,
                                        40
                                    ],
                                    "loc": {
                                        "start": {
                                            "line": 1,
                                            "column": 30
                                        },
                                        "end": {
                                            "line": 1,
                                            "column": 40
                                        }
                                    }
                                }
                            ]
                        },
                        "range": [
                            0,
                            48
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 0
                            },
                            "end": {
                                "line": 1,
                                "column": 48
                            }
                        }
                    },
                    "arguments": [
                        {
                            "type": "ThisExpression",
                            "range": [
                                49,
                                53
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 49
                                },
                                "end": {
                                    "line": 1,
                                    "column": 53
                                }
                            }
                        }
                    ],
                    "range": [
                        0,
                        54
                    ],
                    "loc": {
                        "start": {
                            "line": 1,
                            "column": 0
                        },
                        "end": {
                            "line": 1,
                            "column": 54
                        }
                    }
                },
                "range": [
                    0,
                    54
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 54
                    }
                }
            }
        ],
        "range": [
            0,
            54
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 0
            },
            "end": {
                "line": 1,
                "column": 54
            }
        },
        "comments": [
            {
                "type": "Block",
                "value": " sync ",
                "range": [
                    30,
                    40
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 30
                    },
                    "end": {
                        "line": 1,
                        "column": 40
                    }
                }
            }
        ]
    },
    "function f() { /* infinite */ while (true) { } /* bar */ var each; }": {
        "type": "Program",
        "body": [
            {
                "type": "FunctionDeclaration",
                "id": {
                    "type": "Identifier",
                    "name": "f",
                    "range": [
                        9,
                        10
                    ],
                    "loc": {
                        "start": {
                            "line": 1,
                            "column": 9
                        },
                        "end": {
                            "line": 1,
                            "column": 10
                        }
                    }
                },
                "params": [],
                "defaults": [],
                "body": {
                    "type": "BlockStatement",
                    "body": [
                        {
                            "type": "WhileStatement",
                            "test": {
                                "type": "Literal",
                                "value": true,
                                "raw": "true",
                                "range": [
                                    37,
                                    41
                                ],
                                "loc": {
                                    "start": {
                                        "line": 1,
                                        "column": 37
                                    },
                                    "end": {
                                        "line": 1,
                                        "column": 41
                                    }
                                }
                            },
                            "body": {
                                "type": "BlockStatement",
                                "body": [],
                                "range": [
                                    43,
                                    46
                                ],
                                "loc": {
                                    "start": {
                                        "line": 1,
                                        "column": 43
                                    },
                                    "end": {
                                        "line": 1,
                                        "column": 46
                                    }
                                }
                            },
                            "range": [
                                30,
                                46
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 30
                                },
                                "end": {
                                    "line": 1,
                                    "column": 46
                                }
                            },
                            "leadingComments": [
                                {
                                    "type": "Block",
                                    "value": " infinite ",
                                    "range": [
                                        15,
                                        29
                                    ],
                                    "loc": {
                                        "start": {
                                            "line": 1,
                                            "column": 15
                                        },
                                        "end": {
                                            "line": 1,
                                            "column": 29
                                        }
                                    }
                                }
                            ],
                            "trailingComments": [
                                {
                                    "type": "Block",
                                    "value": " bar ",
                                    "range": [
                                        47,
                                        56
                                    ],
                                    "loc": {
                                        "start": {
                                            "line": 1,
                                            "column": 47
                                        },
                                        "end": {
                                            "line": 1,
                                            "column": 56
                                        }
                                    }
                                }
                            ]
                        },
                        {
                            "type": "VariableDeclaration",
                            "declarations": [
                                {
                                    "type": "VariableDeclarator",
                                    "id": {
                                        "type": "Identifier",
                                        "name": "each",
                                        "range": [
                                            61,
                                            65
                                        ],
                                        "loc": {
                                            "start": {
                                                "line": 1,
                                                "column": 61
                                            },
                                            "end": {
                                                "line": 1,
                                                "column": 65
                                            }
                                        }
                                    },
                                    "init": null,
                                    "range": [
                                        61,
                                        65
                                    ],
                                    "loc": {
                                        "start": {
                                            "line": 1,
                                            "column": 61
                                        },
                                        "end": {
                                            "line": 1,
                                            "column": 65
                                        }
                                    }
                                }
                            ],
                            "kind": "var",
                            "range": [
                                57,
                                66
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 57
                                },
                                "end": {
                                    "line": 1,
                                    "column": 66
                                }
                            },
                            "leadingComments": [
                                {
                                    "type": "Block",
                                    "value": " bar ",
                                    "range": [
                                        47,
                                        56
                                    ],
                                    "loc": {
                                        "start": {
                                            "line": 1,
                                            "column": 47
                                        },
                                        "end": {
                                            "line": 1,
                                            "column": 56
                                        }
                                    }
                                }
                            ]
                        }
                    ],
                    "range": [
                        13,
                        68
                    ],
                    "loc": {
                        "start": {
                            "line": 1,
                            "column": 13
                        },
                        "end": {
                            "line": 1,
                            "column": 68
                        }
                    }
                },
                "rest": null,
                "generator": false,
                "expression": false,
                "range": [
                    0,
                    68
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 68
                    }
                }
            }
        ],
        "range": [
            0,
            68
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 0
            },
            "end": {
                "line": 1,
                "column": 68
            }
        },
        "comments": [
            {
                "type": "Block",
                "value": " infinite ",
                "range": [
                    15,
                    29
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 15
                    },
                    "end": {
                        "line": 1,
                        "column": 29
                    }
                }
            },
            {
                "type": "Block",
                "value": " bar ",
                "range": [
                    47,
                    56
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 47
                    },
                    "end": {
                        "line": 1,
                        "column": 56
                    }
                }
            }
        ]
    },
    "<!-- foo": {
        "type": "Program",
        "body": [],
        "comments": [
            {
                "type": "Line",
                "value": " foo"
            }
        ]
    },
    "var x = 1<!--foo": {
        "type": "Program",
        "body": [
            {
                "type": "VariableDeclaration",
                "declarations": [
                    {
                        "type": "VariableDeclarator",
                        "id": {
                            "type": "Identifier",
                            "name": "x"
                        },
                        "init": {
                            "type": "Literal",
                            "value": 1,
                            "raw": "1"
                        }
                    }
                ],
                "kind": "var"
            }
        ],
        "comments": [
            {
                "type": "Line",
                "value": "foo"
            }
        ]
    },
    "--> comment": {
        "type": "Program",
        "body": [],
        "range": [
            11,
            11
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 11
            },
            "end": {
                "line": 1,
                "column": 11
            }
        },
        "comments": [
            {
                "type": "Line",
                "value": " comment",
                "range": [
                    0,
                    11
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 11
                    }
                }
            }
        ]
    },
    "<!-- comment": {
        "type": "Program",
        "body": [],
        "range": [
            12,
            12
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 12
            },
            "end": {
                "line": 1,
                "column": 12
            }
        },
        "comments": [
            {
                "type": "Line",
                "value": " comment",
                "range": [
                    0,
                    12
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 12
                    }
                }
            }
        ]
    },
    " \t --> comment": {
        "type": "Program",
        "body": [],
        "range": [
            14,
            14
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 14
            },
            "end": {
                "line": 1,
                "column": 14
            }
        },
        "comments": [
            {
                "type": "Line",
                "value": " comment",
                "range": [
                    3,
                    14
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 3
                    },
                    "end": {
                        "line": 1,
                        "column": 14
                    }
                }
            }
        ]
    },
    " \t /* block comment */ --> comment": {
        "type": "Program",
        "body": [],
        "range": [
            35,
            35
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 35
            },
            "end": {
                "line": 1,
                "column": 35
            }
        },
        "comments": [
            {
                "type": "Block",
                "value": " block comment ",
                "range": [
                    3,
                    22
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 3
                    },
                    "end": {
                        "line": 1,
                        "column": 22
                    }
                }
            },
            {
                "type": "Line",
                "value": " comment",
                "range": [
                    24,
                    35
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 24
                    },
                    "end": {
                        "line": 1,
                        "column": 35
                    }
                }
            }
        ]
    },
    "/* block comment */--> comment": {
        "type": "Program",
        "body": [],
        "range": [
            30,
            30
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 30
            },
            "end": {
                "line": 1,
                "column": 30
            }
        },
        "comments": [
            {
                "type": "Block",
                "value": " block comment ",
                "range": [
                    0,
                    19
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 19
                    }
                }
            },
            {
                "type": "Line",
                "value": " comment",
                "range": [
                    19,
                    30
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 19
                    },
                    "end": {
                        "line": 1,
                        "column": 30
                    }
                }
            }
        ]
    },
    "/* not comment*/; i-->0": {
        "type": "Program",
        "body": [
            {
                "type": "EmptyStatement",
                "range": [
                    16,
                    17
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 16
                    },
                    "end": {
                        "line": 1,
                        "column": 17
                    }
                }
            },
            {
                "type": "ExpressionStatement",
                "expression": {
                    "type": "BinaryExpression",
                    "operator": ">",
                    "left": {
                        "type": "UpdateExpression",
                        "operator": "--",
                        "argument": {
                            "type": "Identifier",
                            "name": "i",
                            "range": [
                                18,
                                19
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 18
                                },
                                "end": {
                                    "line": 1,
                                    "column": 19
                                }
                            }
                        },
                        "prefix": false,
                        "range": [
                            18,
                            21
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 18
                            },
                            "end": {
                                "line": 1,
                                "column": 21
                            }
                        }
                    },
                    "right": {
                        "type": "Literal",
                        "value": 0,
                        "raw": "0",
                        "range": [
                            22,
                            23
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 22
                            },
                            "end": {
                                "line": 1,
                                "column": 23
                            }
                        }
                    },
                    "range": [
                        18,
                        23
                    ],
                    "loc": {
                        "start": {
                            "line": 1,
                            "column": 18
                        },
                        "end": {
                            "line": 1,
                            "column": 23
                        }
                    }
                },
                "range": [
                    18,
                    23
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 18
                    },
                    "end": {
                        "line": 1,
                        "column": 23
                    }
                }
            }
        ],
        "range": [
            16,
            23
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 16
            },
            "end": {
                "line": 1,
                "column": 23
            }
        },
        "tokens": [
            {
                "type": "Punctuator",
                "value": ";",
                "range": [
                    16,
                    17
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 16
                    },
                    "end": {
                        "line": 1,
                        "column": 17
                    }
                }
            },
            {
                "type": "Identifier",
                "value": "i",
                "range": [
                    18,
                    19
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 18
                    },
                    "end": {
                        "line": 1,
                        "column": 19
                    }
                }
            },
            {
                "type": "Punctuator",
                "value": "--",
                "range": [
                    19,
                    21
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 19
                    },
                    "end": {
                        "line": 1,
                        "column": 21
                    }
                }
            },
            {
                "type": "Punctuator",
                "value": ">",
                "range": [
                    21,
                    22
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 21
                    },
                    "end": {
                        "line": 1,
                        "column": 22
                    }
                }
            },
            {
                "type": "Numeric",
                "value": "0",
                "range": [
                    22,
                    23
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 22
                    },
                    "end": {
                        "line": 1,
                        "column": 23
                    }
                }
            }
        ]
    },
    "while (i-->0) {}": {
        "type": "WhileStatement",
        "test": {
            "type": "BinaryExpression",
            "operator": ">",
            "left": {
                "type": "UpdateExpression",
                "operator": "--",
                "argument": {
                    "type": "Identifier",
                    "name": "i",
                    "range": [
                        7,
                        8
                    ],
                    "loc": {
                        "start": {
                            "line": 1,
                            "column": 7
                        },
                        "end": {
                            "line": 1,
                            "column": 8
                        }
                    }
                },
                "prefix": false,
                "range": [
                    7,
                    10
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 7
                    },
                    "end": {
                        "line": 1,
                        "column": 10
                    }
                }
            },
            "right": {
                "type": "Literal",
                "value": 0,
                "raw": "0",
                "range": [
                    11,
                    12
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 11
                    },
                    "end": {
                        "line": 1,
                        "column": 12
                    }
                }
            },
            "range": [
                7,
                12
            ],
            "loc": {
                "start": {
                    "line": 1,
                    "column": 7
                },
                "end": {
                    "line": 1,
                    "column": 12
                }
            }
        },
        "body": {
            "type": "BlockStatement",
            "body": [],
            "range": [
                14,
                16
            ],
            "loc": {
                "start": {
                    "line": 1,
                    "column": 14
                },
                "end": {
                    "line": 1,
                    "column": 16
                }
            }
        },
        "range": [
            0,
            16
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 0
            },
            "end": {
                "line": 1,
                "column": 16
            }
        }
    }
}
		');
	}

} 