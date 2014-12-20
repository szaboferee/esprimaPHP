<?php
/**
 * Created by PhpStorm.
 * User: szaboferee
 * Date: 12/20/14
 * Time: 12:58 AM
 */

namespace test;


class ObjectInitializerTest extends BaseTestCase
{

	protected function getFixtures()
{
	return json_decode('
	{
    "x = {}": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "AssignmentExpression",
            "operator": "=",
            "left": {
                "type": "Identifier",
                "name": "x",
                "range": [
                    0,
                    1
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 1
                    }
                }
            },
            "right": {
                "type": "ObjectExpression",
                "properties": [],
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
    },
    "x = { }": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "AssignmentExpression",
            "operator": "=",
            "left": {
                "type": "Identifier",
                "name": "x",
                "range": [
                    0,
                    1
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 1
                    }
                }
            },
            "right": {
                "type": "ObjectExpression",
                "properties": [],
                "range": [
                    4,
                    7
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 4
                    },
                    "end": {
                        "line": 1,
                        "column": 7
                    }
                }
            },
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
            }
        },
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
        }
    },
    "x = { answer: 42 }": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "AssignmentExpression",
            "operator": "=",
            "left": {
                "type": "Identifier",
                "name": "x",
                "range": [
                    0,
                    1
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 1
                    }
                }
            },
            "right": {
                "type": "ObjectExpression",
                "properties": [
                    {
                        "type": "Property",
                        "key": {
                            "type": "Identifier",
                            "name": "answer",
                            "range": [
                                6,
                                12
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 6
                                },
                                "end": {
                                    "line": 1,
                                    "column": 12
                                }
                            }
                        },
                        "value": {
                            "type": "Literal",
                            "value": 42,
                            "raw": "42",
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
                        "kind": "init",
                        "range": [
                            6,
                            16
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 6
                            },
                            "end": {
                                "line": 1,
                                "column": 16
                            }
                        }
                    }
                ],
                "range": [
                    4,
                    18
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 4
                    },
                    "end": {
                        "line": 1,
                        "column": 18
                    }
                }
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
    },
    "x = { if: 42 }": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "AssignmentExpression",
            "operator": "=",
            "left": {
                "type": "Identifier",
                "name": "x",
                "range": [
                    0,
                    1
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 1
                    }
                }
            },
            "right": {
                "type": "ObjectExpression",
                "properties": [
                    {
                        "type": "Property",
                        "key": {
                            "type": "Identifier",
                            "name": "if",
                            "range": [
                                6,
                                8
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 6
                                },
                                "end": {
                                    "line": 1,
                                    "column": 8
                                }
                            }
                        },
                        "value": {
                            "type": "Literal",
                            "value": 42,
                            "raw": "42",
                            "range": [
                                10,
                                12
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 10
                                },
                                "end": {
                                    "line": 1,
                                    "column": 12
                                }
                            }
                        },
                        "kind": "init",
                        "range": [
                            6,
                            12
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 6
                            },
                            "end": {
                                "line": 1,
                                "column": 12
                            }
                        }
                    }
                ],
                "range": [
                    4,
                    14
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 4
                    },
                    "end": {
                        "line": 1,
                        "column": 14
                    }
                }
            },
            "range": [
                0,
                14
            ],
            "loc": {
                "start": {
                    "line": 1,
                    "column": 0
                },
                "end": {
                    "line": 1,
                    "column": 14
                }
            }
        },
        "range": [
            0,
            14
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 0
            },
            "end": {
                "line": 1,
                "column": 14
            }
        }
    },
    "x = { true: 42 }": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "AssignmentExpression",
            "operator": "=",
            "left": {
                "type": "Identifier",
                "name": "x",
                "range": [
                    0,
                    1
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 1
                    }
                }
            },
            "right": {
                "type": "ObjectExpression",
                "properties": [
                    {
                        "type": "Property",
                        "key": {
                            "type": "Identifier",
                            "name": "true",
                            "range": [
                                6,
                                10
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 6
                                },
                                "end": {
                                    "line": 1,
                                    "column": 10
                                }
                            }
                        },
                        "value": {
                            "type": "Literal",
                            "value": 42,
                            "raw": "42",
                            "range": [
                                12,
                                14
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 12
                                },
                                "end": {
                                    "line": 1,
                                    "column": 14
                                }
                            }
                        },
                        "kind": "init",
                        "range": [
                            6,
                            14
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 6
                            },
                            "end": {
                                "line": 1,
                                "column": 14
                            }
                        }
                    }
                ],
                "range": [
                    4,
                    16
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 4
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
    },
    "x = { false: 42 }": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "AssignmentExpression",
            "operator": "=",
            "left": {
                "type": "Identifier",
                "name": "x",
                "range": [
                    0,
                    1
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 1
                    }
                }
            },
            "right": {
                "type": "ObjectExpression",
                "properties": [
                    {
                        "type": "Property",
                        "key": {
                            "type": "Identifier",
                            "name": "false",
                            "range": [
                                6,
                                11
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 6
                                },
                                "end": {
                                    "line": 1,
                                    "column": 11
                                }
                            }
                        },
                        "value": {
                            "type": "Literal",
                            "value": 42,
                            "raw": "42",
                            "range": [
                                13,
                                15
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 13
                                },
                                "end": {
                                    "line": 1,
                                    "column": 15
                                }
                            }
                        },
                        "kind": "init",
                        "range": [
                            6,
                            15
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 6
                            },
                            "end": {
                                "line": 1,
                                "column": 15
                            }
                        }
                    }
                ],
                "range": [
                    4,
                    17
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 4
                    },
                    "end": {
                        "line": 1,
                        "column": 17
                    }
                }
            },
            "range": [
                0,
                17
            ],
            "loc": {
                "start": {
                    "line": 1,
                    "column": 0
                },
                "end": {
                    "line": 1,
                    "column": 17
                }
            }
        },
        "range": [
            0,
            17
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 0
            },
            "end": {
                "line": 1,
                "column": 17
            }
        }
    },
    "x = { null: 42 }": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "AssignmentExpression",
            "operator": "=",
            "left": {
                "type": "Identifier",
                "name": "x",
                "range": [
                    0,
                    1
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 1
                    }
                }
            },
            "right": {
                "type": "ObjectExpression",
                "properties": [
                    {
                        "type": "Property",
                        "key": {
                            "type": "Identifier",
                            "name": "null",
                            "range": [
                                6,
                                10
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 6
                                },
                                "end": {
                                    "line": 1,
                                    "column": 10
                                }
                            }
                        },
                        "value": {
                            "type": "Literal",
                            "value": 42,
                            "raw": "42",
                            "range": [
                                12,
                                14
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 12
                                },
                                "end": {
                                    "line": 1,
                                    "column": 14
                                }
                            }
                        },
                        "kind": "init",
                        "range": [
                            6,
                            14
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 6
                            },
                            "end": {
                                "line": 1,
                                "column": 14
                            }
                        }
                    }
                ],
                "range": [
                    4,
                    16
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 4
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
    },
    "x = { \"answer\": 42 }": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "AssignmentExpression",
            "operator": "=",
            "left": {
                "type": "Identifier",
                "name": "x",
                "range": [
                    0,
                    1
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 1
                    }
                }
            },
            "right": {
                "type": "ObjectExpression",
                "properties": [
                    {
                        "type": "Property",
                        "key": {
                            "type": "Literal",
                            "value": "answer",
                            "raw": "\"answer\"",
                            "range": [
                                6,
                                14
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 6
                                },
                                "end": {
                                    "line": 1,
                                    "column": 14
                                }
                            }
                        },
                        "value": {
                            "type": "Literal",
                            "value": 42,
                            "raw": "42",
                            "range": [
                                16,
                                18
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 16
                                },
                                "end": {
                                    "line": 1,
                                    "column": 18
                                }
                            }
                        },
                        "kind": "init",
                        "range": [
                            6,
                            18
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 6
                            },
                            "end": {
                                "line": 1,
                                "column": 18
                            }
                        }
                    }
                ],
                "range": [
                    4,
                    20
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 4
                    },
                    "end": {
                        "line": 1,
                        "column": 20
                    }
                }
            },
            "range": [
                0,
                20
            ],
            "loc": {
                "start": {
                    "line": 1,
                    "column": 0
                },
                "end": {
                    "line": 1,
                    "column": 20
                }
            }
        },
        "range": [
            0,
            20
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 0
            },
            "end": {
                "line": 1,
                "column": 20
            }
        }
    },
    "x = { x: 1, x: 2 }": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "AssignmentExpression",
            "operator": "=",
            "left": {
                "type": "Identifier",
                "name": "x",
                "range": [
                    0,
                    1
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 1
                    }
                }
            },
            "right": {
                "type": "ObjectExpression",
                "properties": [
                    {
                        "type": "Property",
                        "key": {
                            "type": "Identifier",
                            "name": "x",
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
                            }
                        },
                        "value": {
                            "type": "Literal",
                            "value": 1,
                            "raw": "1",
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
                        "kind": "init",
                        "range": [
                            6,
                            10
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 6
                            },
                            "end": {
                                "line": 1,
                                "column": 10
                            }
                        }
                    },
                    {
                        "type": "Property",
                        "key": {
                            "type": "Identifier",
                            "name": "x",
                            "range": [
                                12,
                                13
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 12
                                },
                                "end": {
                                    "line": 1,
                                    "column": 13
                                }
                            }
                        },
                        "value": {
                            "type": "Literal",
                            "value": 2,
                            "raw": "2",
                            "range": [
                                15,
                                16
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 15
                                },
                                "end": {
                                    "line": 1,
                                    "column": 16
                                }
                            }
                        },
                        "kind": "init",
                        "range": [
                            12,
                            16
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 12
                            },
                            "end": {
                                "line": 1,
                                "column": 16
                            }
                        }
                    }
                ],
                "range": [
                    4,
                    18
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 4
                    },
                    "end": {
                        "line": 1,
                        "column": 18
                    }
                }
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
    },
    "x = { get width() { return m_width } }": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "AssignmentExpression",
            "operator": "=",
            "left": {
                "type": "Identifier",
                "name": "x",
                "range": [
                    0,
                    1
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 1
                    }
                }
            },
            "right": {
                "type": "ObjectExpression",
                "properties": [
                    {
                        "type": "Property",
                        "key": {
                            "type": "Identifier",
                            "name": "width",
                            "range": [
                                10,
                                15
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 10
                                },
                                "end": {
                                    "line": 1,
                                    "column": 15
                                }
                            }
                        },
                        "value": {
                            "type": "FunctionExpression",
                            "id": null,
                            "params": [],
                            "defaults": [],
                            "body": {
                                "type": "BlockStatement",
                                "body": [
                                    {
                                        "type": "ReturnStatement",
                                        "argument": {
                                            "type": "Identifier",
                                            "name": "m_width",
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
                                            }
                                        },
                                        "range": [
                                            20,
                                            35
                                        ],
                                        "loc": {
                                            "start": {
                                                "line": 1,
                                                "column": 20
                                            },
                                            "end": {
                                                "line": 1,
                                                "column": 35
                                            }
                                        }
                                    }
                                ],
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
                            },
                            "rest": null,
                            "generator": false,
                            "expression": false,
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
                        },
                        "kind": "get",
                        "range": [
                            6,
                            36
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 6
                            },
                            "end": {
                                "line": 1,
                                "column": 36
                            }
                        }
                    }
                ],
                "range": [
                    4,
                    38
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 4
                    },
                    "end": {
                        "line": 1,
                        "column": 38
                    }
                }
            },
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
        },
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
    },
    "x = { get undef() {} }": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "AssignmentExpression",
            "operator": "=",
            "left": {
                "type": "Identifier",
                "name": "x",
                "range": [
                    0,
                    1
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 1
                    }
                }
            },
            "right": {
                "type": "ObjectExpression",
                "properties": [
                    {
                        "type": "Property",
                        "key": {
                            "type": "Identifier",
                            "name": "undef",
                            "range": [
                                10,
                                15
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 10
                                },
                                "end": {
                                    "line": 1,
                                    "column": 15
                                }
                            }
                        },
                        "value": {
                            "type": "FunctionExpression",
                            "id": null,
                            "params": [],
                            "defaults": [],
                            "body": {
                                "type": "BlockStatement",
                                "body": [],
                                "range": [
                                    18,
                                    20
                                ],
                                "loc": {
                                    "start": {
                                        "line": 1,
                                        "column": 18
                                    },
                                    "end": {
                                        "line": 1,
                                        "column": 20
                                    }
                                }
                            },
                            "rest": null,
                            "generator": false,
                            "expression": false,
                            "range": [
                                18,
                                20
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 18
                                },
                                "end": {
                                    "line": 1,
                                    "column": 20
                                }
                            }
                        },
                        "kind": "get",
                        "range": [
                            6,
                            20
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 6
                            },
                            "end": {
                                "line": 1,
                                "column": 20
                            }
                        }
                    }
                ],
                "range": [
                    4,
                    22
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 4
                    },
                    "end": {
                        "line": 1,
                        "column": 22
                    }
                }
            },
            "range": [
                0,
                22
            ],
            "loc": {
                "start": {
                    "line": 1,
                    "column": 0
                },
                "end": {
                    "line": 1,
                    "column": 22
                }
            }
        },
        "range": [
            0,
            22
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 0
            },
            "end": {
                "line": 1,
                "column": 22
            }
        }
    },
    "x = { get if() {} }": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "AssignmentExpression",
            "operator": "=",
            "left": {
                "type": "Identifier",
                "name": "x",
                "range": [
                    0,
                    1
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 1
                    }
                }
            },
            "right": {
                "type": "ObjectExpression",
                "properties": [
                    {
                        "type": "Property",
                        "key": {
                            "type": "Identifier",
                            "name": "if",
                            "range": [
                                10,
                                12
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 10
                                },
                                "end": {
                                    "line": 1,
                                    "column": 12
                                }
                            }
                        },
                        "value": {
                            "type": "FunctionExpression",
                            "id": null,
                            "params": [],
                            "defaults": [],
                            "body": {
                                "type": "BlockStatement",
                                "body": [],
                                "range": [
                                    15,
                                    17
                                ],
                                "loc": {
                                    "start": {
                                        "line": 1,
                                        "column": 15
                                    },
                                    "end": {
                                        "line": 1,
                                        "column": 17
                                    }
                                }
                            },
                            "rest": null,
                            "generator": false,
                            "expression": false,
                            "range": [
                                15,
                                17
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 15
                                },
                                "end": {
                                    "line": 1,
                                    "column": 17
                                }
                            }
                        },
                        "kind": "get",
                        "range": [
                            6,
                            17
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 6
                            },
                            "end": {
                                "line": 1,
                                "column": 17
                            }
                        }
                    }
                ],
                "range": [
                    4,
                    19
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 4
                    },
                    "end": {
                        "line": 1,
                        "column": 19
                    }
                }
            },
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
    "x = { get true() {} }": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "AssignmentExpression",
            "operator": "=",
            "left": {
                "type": "Identifier",
                "name": "x",
                "range": [
                    0,
                    1
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 1
                    }
                }
            },
            "right": {
                "type": "ObjectExpression",
                "properties": [
                    {
                        "type": "Property",
                        "key": {
                            "type": "Identifier",
                            "name": "true",
                            "range": [
                                10,
                                14
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 10
                                },
                                "end": {
                                    "line": 1,
                                    "column": 14
                                }
                            }
                        },
                        "value": {
                            "type": "FunctionExpression",
                            "id": null,
                            "params": [],
                            "defaults": [],
                            "body": {
                                "type": "BlockStatement",
                                "body": [],
                                "range": [
                                    17,
                                    19
                                ],
                                "loc": {
                                    "start": {
                                        "line": 1,
                                        "column": 17
                                    },
                                    "end": {
                                        "line": 1,
                                        "column": 19
                                    }
                                }
                            },
                            "rest": null,
                            "generator": false,
                            "expression": false,
                            "range": [
                                17,
                                19
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 17
                                },
                                "end": {
                                    "line": 1,
                                    "column": 19
                                }
                            }
                        },
                        "kind": "get",
                        "range": [
                            6,
                            19
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 6
                            },
                            "end": {
                                "line": 1,
                                "column": 19
                            }
                        }
                    }
                ],
                "range": [
                    4,
                    21
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 4
                    },
                    "end": {
                        "line": 1,
                        "column": 21
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
    "x = { get false() {} }": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "AssignmentExpression",
            "operator": "=",
            "left": {
                "type": "Identifier",
                "name": "x",
                "range": [
                    0,
                    1
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 1
                    }
                }
            },
            "right": {
                "type": "ObjectExpression",
                "properties": [
                    {
                        "type": "Property",
                        "key": {
                            "type": "Identifier",
                            "name": "false",
                            "range": [
                                10,
                                15
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 10
                                },
                                "end": {
                                    "line": 1,
                                    "column": 15
                                }
                            }
                        },
                        "value": {
                            "type": "FunctionExpression",
                            "id": null,
                            "params": [],
                            "defaults": [],
                            "body": {
                                "type": "BlockStatement",
                                "body": [],
                                "range": [
                                    18,
                                    20
                                ],
                                "loc": {
                                    "start": {
                                        "line": 1,
                                        "column": 18
                                    },
                                    "end": {
                                        "line": 1,
                                        "column": 20
                                    }
                                }
                            },
                            "rest": null,
                            "generator": false,
                            "expression": false,
                            "range": [
                                18,
                                20
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 18
                                },
                                "end": {
                                    "line": 1,
                                    "column": 20
                                }
                            }
                        },
                        "kind": "get",
                        "range": [
                            6,
                            20
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 6
                            },
                            "end": {
                                "line": 1,
                                "column": 20
                            }
                        }
                    }
                ],
                "range": [
                    4,
                    22
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 4
                    },
                    "end": {
                        "line": 1,
                        "column": 22
                    }
                }
            },
            "range": [
                0,
                22
            ],
            "loc": {
                "start": {
                    "line": 1,
                    "column": 0
                },
                "end": {
                    "line": 1,
                    "column": 22
                }
            }
        },
        "range": [
            0,
            22
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 0
            },
            "end": {
                "line": 1,
                "column": 22
            }
        }
    },
    "x = { get null() {} }": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "AssignmentExpression",
            "operator": "=",
            "left": {
                "type": "Identifier",
                "name": "x",
                "range": [
                    0,
                    1
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 1
                    }
                }
            },
            "right": {
                "type": "ObjectExpression",
                "properties": [
                    {
                        "type": "Property",
                        "key": {
                            "type": "Identifier",
                            "name": "null",
                            "range": [
                                10,
                                14
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 10
                                },
                                "end": {
                                    "line": 1,
                                    "column": 14
                                }
                            }
                        },
                        "value": {
                            "type": "FunctionExpression",
                            "id": null,
                            "params": [],
                            "defaults": [],
                            "body": {
                                "type": "BlockStatement",
                                "body": [],
                                "range": [
                                    17,
                                    19
                                ],
                                "loc": {
                                    "start": {
                                        "line": 1,
                                        "column": 17
                                    },
                                    "end": {
                                        "line": 1,
                                        "column": 19
                                    }
                                }
                            },
                            "rest": null,
                            "generator": false,
                            "expression": false,
                            "range": [
                                17,
                                19
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 17
                                },
                                "end": {
                                    "line": 1,
                                    "column": 19
                                }
                            }
                        },
                        "kind": "get",
                        "range": [
                            6,
                            19
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 6
                            },
                            "end": {
                                "line": 1,
                                "column": 19
                            }
                        }
                    }
                ],
                "range": [
                    4,
                    21
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 4
                    },
                    "end": {
                        "line": 1,
                        "column": 21
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
    "x = { get \"undef\"() {} }": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "AssignmentExpression",
            "operator": "=",
            "left": {
                "type": "Identifier",
                "name": "x",
                "range": [
                    0,
                    1
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 1
                    }
                }
            },
            "right": {
                "type": "ObjectExpression",
                "properties": [
                    {
                        "type": "Property",
                        "key": {
                            "type": "Literal",
                            "value": "undef",
                            "raw": "\"undef\"",
                            "range": [
                                10,
                                17
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 10
                                },
                                "end": {
                                    "line": 1,
                                    "column": 17
                                }
                            }
                        },
                        "value": {
                            "type": "FunctionExpression",
                            "id": null,
                            "params": [],
                            "defaults": [],
                            "body": {
                                "type": "BlockStatement",
                                "body": [],
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
                            "rest": null,
                            "generator": false,
                            "expression": false,
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
                        "kind": "get",
                        "range": [
                            6,
                            22
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 6
                            },
                            "end": {
                                "line": 1,
                                "column": 22
                            }
                        }
                    }
                ],
                "range": [
                    4,
                    24
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 4
                    },
                    "end": {
                        "line": 1,
                        "column": 24
                    }
                }
            },
            "range": [
                0,
                24
            ],
            "loc": {
                "start": {
                    "line": 1,
                    "column": 0
                },
                "end": {
                    "line": 1,
                    "column": 24
                }
            }
        },
        "range": [
            0,
            24
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 0
            },
            "end": {
                "line": 1,
                "column": 24
            }
        }
    },
    "x = { get 10() {} }": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "AssignmentExpression",
            "operator": "=",
            "left": {
                "type": "Identifier",
                "name": "x",
                "range": [
                    0,
                    1
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 1
                    }
                }
            },
            "right": {
                "type": "ObjectExpression",
                "properties": [
                    {
                        "type": "Property",
                        "key": {
                            "type": "Literal",
                            "value": 10,
                            "raw": "10",
                            "range": [
                                10,
                                12
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 10
                                },
                                "end": {
                                    "line": 1,
                                    "column": 12
                                }
                            }
                        },
                        "value": {
                            "type": "FunctionExpression",
                            "id": null,
                            "params": [],
                            "defaults": [],
                            "body": {
                                "type": "BlockStatement",
                                "body": [],
                                "range": [
                                    15,
                                    17
                                ],
                                "loc": {
                                    "start": {
                                        "line": 1,
                                        "column": 15
                                    },
                                    "end": {
                                        "line": 1,
                                        "column": 17
                                    }
                                }
                            },
                            "rest": null,
                            "generator": false,
                            "expression": false,
                            "range": [
                                15,
                                17
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 15
                                },
                                "end": {
                                    "line": 1,
                                    "column": 17
                                }
                            }
                        },
                        "kind": "get",
                        "range": [
                            6,
                            17
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 6
                            },
                            "end": {
                                "line": 1,
                                "column": 17
                            }
                        }
                    }
                ],
                "range": [
                    4,
                    19
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 4
                    },
                    "end": {
                        "line": 1,
                        "column": 19
                    }
                }
            },
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
    "x = { set width(w) { m_width = w } }": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "AssignmentExpression",
            "operator": "=",
            "left": {
                "type": "Identifier",
                "name": "x",
                "range": [
                    0,
                    1
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 1
                    }
                }
            },
            "right": {
                "type": "ObjectExpression",
                "properties": [
                    {
                        "type": "Property",
                        "key": {
                            "type": "Identifier",
                            "name": "width",
                            "range": [
                                10,
                                15
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 10
                                },
                                "end": {
                                    "line": 1,
                                    "column": 15
                                }
                            }
                        },
                        "value": {
                            "type": "FunctionExpression",
                            "id": null,
                            "params": [
                                {
                                    "type": "Identifier",
                                    "name": "w",
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
                                }
                            ],
                            "defaults": [],
                            "body": {
                                "type": "BlockStatement",
                                "body": [
                                    {
                                        "type": "ExpressionStatement",
                                        "expression": {
                                            "type": "AssignmentExpression",
                                            "operator": "=",
                                            "left": {
                                                "type": "Identifier",
                                                "name": "m_width",
                                                "range": [
                                                    21,
                                                    28
                                                ],
                                                "loc": {
                                                    "start": {
                                                        "line": 1,
                                                        "column": 21
                                                    },
                                                    "end": {
                                                        "line": 1,
                                                        "column": 28
                                                    }
                                                }
                                            },
                                            "right": {
                                                "type": "Identifier",
                                                "name": "w",
                                                "range": [
                                                    31,
                                                    32
                                                ],
                                                "loc": {
                                                    "start": {
                                                        "line": 1,
                                                        "column": 31
                                                    },
                                                    "end": {
                                                        "line": 1,
                                                        "column": 32
                                                    }
                                                }
                                            },
                                            "range": [
                                                21,
                                                32
                                            ],
                                            "loc": {
                                                "start": {
                                                    "line": 1,
                                                    "column": 21
                                                },
                                                "end": {
                                                    "line": 1,
                                                    "column": 32
                                                }
                                            }
                                        },
                                        "range": [
                                            21,
                                            33
                                        ],
                                        "loc": {
                                            "start": {
                                                "line": 1,
                                                "column": 21
                                            },
                                            "end": {
                                                "line": 1,
                                                "column": 33
                                            }
                                        }
                                    }
                                ],
                                "range": [
                                    19,
                                    34
                                ],
                                "loc": {
                                    "start": {
                                        "line": 1,
                                        "column": 19
                                    },
                                    "end": {
                                        "line": 1,
                                        "column": 34
                                    }
                                }
                            },
                            "rest": null,
                            "generator": false,
                            "expression": false,
                            "range": [
                                19,
                                34
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 19
                                },
                                "end": {
                                    "line": 1,
                                    "column": 34
                                }
                            }
                        },
                        "kind": "set",
                        "range": [
                            6,
                            34
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 6
                            },
                            "end": {
                                "line": 1,
                                "column": 34
                            }
                        }
                    }
                ],
                "range": [
                    4,
                    36
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 4
                    },
                    "end": {
                        "line": 1,
                        "column": 36
                    }
                }
            },
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
                    "line": 1,
                    "column": 36
                }
            }
        },
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
                "line": 1,
                "column": 36
            }
        }
    },
    "x = { set if(w) { m_if = w } }": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "AssignmentExpression",
            "operator": "=",
            "left": {
                "type": "Identifier",
                "name": "x",
                "range": [
                    0,
                    1
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 1
                    }
                }
            },
            "right": {
                "type": "ObjectExpression",
                "properties": [
                    {
                        "type": "Property",
                        "key": {
                            "type": "Identifier",
                            "name": "if",
                            "range": [
                                10,
                                12
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 10
                                },
                                "end": {
                                    "line": 1,
                                    "column": 12
                                }
                            }
                        },
                        "value": {
                            "type": "FunctionExpression",
                            "id": null,
                            "params": [
                                {
                                    "type": "Identifier",
                                    "name": "w",
                                    "range": [
                                        13,
                                        14
                                    ],
                                    "loc": {
                                        "start": {
                                            "line": 1,
                                            "column": 13
                                        },
                                        "end": {
                                            "line": 1,
                                            "column": 14
                                        }
                                    }
                                }
                            ],
                            "defaults": [],
                            "body": {
                                "type": "BlockStatement",
                                "body": [
                                    {
                                        "type": "ExpressionStatement",
                                        "expression": {
                                            "type": "AssignmentExpression",
                                            "operator": "=",
                                            "left": {
                                                "type": "Identifier",
                                                "name": "m_if",
                                                "range": [
                                                    18,
                                                    22
                                                ],
                                                "loc": {
                                                    "start": {
                                                        "line": 1,
                                                        "column": 18
                                                    },
                                                    "end": {
                                                        "line": 1,
                                                        "column": 22
                                                    }
                                                }
                                            },
                                            "right": {
                                                "type": "Identifier",
                                                "name": "w",
                                                "range": [
                                                    25,
                                                    26
                                                ],
                                                "loc": {
                                                    "start": {
                                                        "line": 1,
                                                        "column": 25
                                                    },
                                                    "end": {
                                                        "line": 1,
                                                        "column": 26
                                                    }
                                                }
                                            },
                                            "range": [
                                                18,
                                                26
                                            ],
                                            "loc": {
                                                "start": {
                                                    "line": 1,
                                                    "column": 18
                                                },
                                                "end": {
                                                    "line": 1,
                                                    "column": 26
                                                }
                                            }
                                        },
                                        "range": [
                                            18,
                                            27
                                        ],
                                        "loc": {
                                            "start": {
                                                "line": 1,
                                                "column": 18
                                            },
                                            "end": {
                                                "line": 1,
                                                "column": 27
                                            }
                                        }
                                    }
                                ],
                                "range": [
                                    16,
                                    28
                                ],
                                "loc": {
                                    "start": {
                                        "line": 1,
                                        "column": 16
                                    },
                                    "end": {
                                        "line": 1,
                                        "column": 28
                                    }
                                }
                            },
                            "rest": null,
                            "generator": false,
                            "expression": false,
                            "range": [
                                16,
                                28
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 16
                                },
                                "end": {
                                    "line": 1,
                                    "column": 28
                                }
                            }
                        },
                        "kind": "set",
                        "range": [
                            6,
                            28
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 6
                            },
                            "end": {
                                "line": 1,
                                "column": 28
                            }
                        }
                    }
                ],
                "range": [
                    4,
                    30
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 4
                    },
                    "end": {
                        "line": 1,
                        "column": 30
                    }
                }
            },
            "range": [
                0,
                30
            ],
            "loc": {
                "start": {
                    "line": 1,
                    "column": 0
                },
                "end": {
                    "line": 1,
                    "column": 30
                }
            }
        },
        "range": [
            0,
            30
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 0
            },
            "end": {
                "line": 1,
                "column": 30
            }
        }
    },
    "x = { set true(w) { m_true = w } }": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "AssignmentExpression",
            "operator": "=",
            "left": {
                "type": "Identifier",
                "name": "x",
                "range": [
                    0,
                    1
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 1
                    }
                }
            },
            "right": {
                "type": "ObjectExpression",
                "properties": [
                    {
                        "type": "Property",
                        "key": {
                            "type": "Identifier",
                            "name": "true",
                            "range": [
                                10,
                                14
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 10
                                },
                                "end": {
                                    "line": 1,
                                    "column": 14
                                }
                            }
                        },
                        "value": {
                            "type": "FunctionExpression",
                            "id": null,
                            "params": [
                                {
                                    "type": "Identifier",
                                    "name": "w",
                                    "range": [
                                        15,
                                        16
                                    ],
                                    "loc": {
                                        "start": {
                                            "line": 1,
                                            "column": 15
                                        },
                                        "end": {
                                            "line": 1,
                                            "column": 16
                                        }
                                    }
                                }
                            ],
                            "defaults": [],
                            "body": {
                                "type": "BlockStatement",
                                "body": [
                                    {
                                        "type": "ExpressionStatement",
                                        "expression": {
                                            "type": "AssignmentExpression",
                                            "operator": "=",
                                            "left": {
                                                "type": "Identifier",
                                                "name": "m_true",
                                                "range": [
                                                    20,
                                                    26
                                                ],
                                                "loc": {
                                                    "start": {
                                                        "line": 1,
                                                        "column": 20
                                                    },
                                                    "end": {
                                                        "line": 1,
                                                        "column": 26
                                                    }
                                                }
                                            },
                                            "right": {
                                                "type": "Identifier",
                                                "name": "w",
                                                "range": [
                                                    29,
                                                    30
                                                ],
                                                "loc": {
                                                    "start": {
                                                        "line": 1,
                                                        "column": 29
                                                    },
                                                    "end": {
                                                        "line": 1,
                                                        "column": 30
                                                    }
                                                }
                                            },
                                            "range": [
                                                20,
                                                30
                                            ],
                                            "loc": {
                                                "start": {
                                                    "line": 1,
                                                    "column": 20
                                                },
                                                "end": {
                                                    "line": 1,
                                                    "column": 30
                                                }
                                            }
                                        },
                                        "range": [
                                            20,
                                            31
                                        ],
                                        "loc": {
                                            "start": {
                                                "line": 1,
                                                "column": 20
                                            },
                                            "end": {
                                                "line": 1,
                                                "column": 31
                                            }
                                        }
                                    }
                                ],
                                "range": [
                                    18,
                                    32
                                ],
                                "loc": {
                                    "start": {
                                        "line": 1,
                                        "column": 18
                                    },
                                    "end": {
                                        "line": 1,
                                        "column": 32
                                    }
                                }
                            },
                            "rest": null,
                            "generator": false,
                            "expression": false,
                            "range": [
                                18,
                                32
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 18
                                },
                                "end": {
                                    "line": 1,
                                    "column": 32
                                }
                            }
                        },
                        "kind": "set",
                        "range": [
                            6,
                            32
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 6
                            },
                            "end": {
                                "line": 1,
                                "column": 32
                            }
                        }
                    }
                ],
                "range": [
                    4,
                    34
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 4
                    },
                    "end": {
                        "line": 1,
                        "column": 34
                    }
                }
            },
            "range": [
                0,
                34
            ],
            "loc": {
                "start": {
                    "line": 1,
                    "column": 0
                },
                "end": {
                    "line": 1,
                    "column": 34
                }
            }
        },
        "range": [
            0,
            34
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 0
            },
            "end": {
                "line": 1,
                "column": 34
            }
        }
    },
    "x = { set false(w) { m_false = w } }": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "AssignmentExpression",
            "operator": "=",
            "left": {
                "type": "Identifier",
                "name": "x",
                "range": [
                    0,
                    1
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 1
                    }
                }
            },
            "right": {
                "type": "ObjectExpression",
                "properties": [
                    {
                        "type": "Property",
                        "key": {
                            "type": "Identifier",
                            "name": "false",
                            "range": [
                                10,
                                15
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 10
                                },
                                "end": {
                                    "line": 1,
                                    "column": 15
                                }
                            }
                        },
                        "value": {
                            "type": "FunctionExpression",
                            "id": null,
                            "params": [
                                {
                                    "type": "Identifier",
                                    "name": "w",
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
                                }
                            ],
                            "defaults": [],
                            "body": {
                                "type": "BlockStatement",
                                "body": [
                                    {
                                        "type": "ExpressionStatement",
                                        "expression": {
                                            "type": "AssignmentExpression",
                                            "operator": "=",
                                            "left": {
                                                "type": "Identifier",
                                                "name": "m_false",
                                                "range": [
                                                    21,
                                                    28
                                                ],
                                                "loc": {
                                                    "start": {
                                                        "line": 1,
                                                        "column": 21
                                                    },
                                                    "end": {
                                                        "line": 1,
                                                        "column": 28
                                                    }
                                                }
                                            },
                                            "right": {
                                                "type": "Identifier",
                                                "name": "w",
                                                "range": [
                                                    31,
                                                    32
                                                ],
                                                "loc": {
                                                    "start": {
                                                        "line": 1,
                                                        "column": 31
                                                    },
                                                    "end": {
                                                        "line": 1,
                                                        "column": 32
                                                    }
                                                }
                                            },
                                            "range": [
                                                21,
                                                32
                                            ],
                                            "loc": {
                                                "start": {
                                                    "line": 1,
                                                    "column": 21
                                                },
                                                "end": {
                                                    "line": 1,
                                                    "column": 32
                                                }
                                            }
                                        },
                                        "range": [
                                            21,
                                            33
                                        ],
                                        "loc": {
                                            "start": {
                                                "line": 1,
                                                "column": 21
                                            },
                                            "end": {
                                                "line": 1,
                                                "column": 33
                                            }
                                        }
                                    }
                                ],
                                "range": [
                                    19,
                                    34
                                ],
                                "loc": {
                                    "start": {
                                        "line": 1,
                                        "column": 19
                                    },
                                    "end": {
                                        "line": 1,
                                        "column": 34
                                    }
                                }
                            },
                            "rest": null,
                            "generator": false,
                            "expression": false,
                            "range": [
                                19,
                                34
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 19
                                },
                                "end": {
                                    "line": 1,
                                    "column": 34
                                }
                            }
                        },
                        "kind": "set",
                        "range": [
                            6,
                            34
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 6
                            },
                            "end": {
                                "line": 1,
                                "column": 34
                            }
                        }
                    }
                ],
                "range": [
                    4,
                    36
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 4
                    },
                    "end": {
                        "line": 1,
                        "column": 36
                    }
                }
            },
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
                    "line": 1,
                    "column": 36
                }
            }
        },
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
                "line": 1,
                "column": 36
            }
        }
    },
    "x = { set null(w) { m_null = w } }": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "AssignmentExpression",
            "operator": "=",
            "left": {
                "type": "Identifier",
                "name": "x",
                "range": [
                    0,
                    1
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 1
                    }
                }
            },
            "right": {
                "type": "ObjectExpression",
                "properties": [
                    {
                        "type": "Property",
                        "key": {
                            "type": "Identifier",
                            "name": "null",
                            "range": [
                                10,
                                14
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 10
                                },
                                "end": {
                                    "line": 1,
                                    "column": 14
                                }
                            }
                        },
                        "value": {
                            "type": "FunctionExpression",
                            "id": null,
                            "params": [
                                {
                                    "type": "Identifier",
                                    "name": "w",
                                    "range": [
                                        15,
                                        16
                                    ],
                                    "loc": {
                                        "start": {
                                            "line": 1,
                                            "column": 15
                                        },
                                        "end": {
                                            "line": 1,
                                            "column": 16
                                        }
                                    }
                                }
                            ],
                            "defaults": [],
                            "body": {
                                "type": "BlockStatement",
                                "body": [
                                    {
                                        "type": "ExpressionStatement",
                                        "expression": {
                                            "type": "AssignmentExpression",
                                            "operator": "=",
                                            "left": {
                                                "type": "Identifier",
                                                "name": "m_null",
                                                "range": [
                                                    20,
                                                    26
                                                ],
                                                "loc": {
                                                    "start": {
                                                        "line": 1,
                                                        "column": 20
                                                    },
                                                    "end": {
                                                        "line": 1,
                                                        "column": 26
                                                    }
                                                }
                                            },
                                            "right": {
                                                "type": "Identifier",
                                                "name": "w",
                                                "range": [
                                                    29,
                                                    30
                                                ],
                                                "loc": {
                                                    "start": {
                                                        "line": 1,
                                                        "column": 29
                                                    },
                                                    "end": {
                                                        "line": 1,
                                                        "column": 30
                                                    }
                                                }
                                            },
                                            "range": [
                                                20,
                                                30
                                            ],
                                            "loc": {
                                                "start": {
                                                    "line": 1,
                                                    "column": 20
                                                },
                                                "end": {
                                                    "line": 1,
                                                    "column": 30
                                                }
                                            }
                                        },
                                        "range": [
                                            20,
                                            31
                                        ],
                                        "loc": {
                                            "start": {
                                                "line": 1,
                                                "column": 20
                                            },
                                            "end": {
                                                "line": 1,
                                                "column": 31
                                            }
                                        }
                                    }
                                ],
                                "range": [
                                    18,
                                    32
                                ],
                                "loc": {
                                    "start": {
                                        "line": 1,
                                        "column": 18
                                    },
                                    "end": {
                                        "line": 1,
                                        "column": 32
                                    }
                                }
                            },
                            "rest": null,
                            "generator": false,
                            "expression": false,
                            "range": [
                                18,
                                32
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 18
                                },
                                "end": {
                                    "line": 1,
                                    "column": 32
                                }
                            }
                        },
                        "kind": "set",
                        "range": [
                            6,
                            32
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 6
                            },
                            "end": {
                                "line": 1,
                                "column": 32
                            }
                        }
                    }
                ],
                "range": [
                    4,
                    34
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 4
                    },
                    "end": {
                        "line": 1,
                        "column": 34
                    }
                }
            },
            "range": [
                0,
                34
            ],
            "loc": {
                "start": {
                    "line": 1,
                    "column": 0
                },
                "end": {
                    "line": 1,
                    "column": 34
                }
            }
        },
        "range": [
            0,
            34
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 0
            },
            "end": {
                "line": 1,
                "column": 34
            }
        }
    },
    "x = { set \"null\"(w) { m_null = w } }": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "AssignmentExpression",
            "operator": "=",
            "left": {
                "type": "Identifier",
                "name": "x",
                "range": [
                    0,
                    1
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 1
                    }
                }
            },
            "right": {
                "type": "ObjectExpression",
                "properties": [
                    {
                        "type": "Property",
                        "key": {
                            "type": "Literal",
                            "value": "null",
                            "raw": "\"null\"",
                            "range": [
                                10,
                                16
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 10
                                },
                                "end": {
                                    "line": 1,
                                    "column": 16
                                }
                            }
                        },
                        "value": {
                            "type": "FunctionExpression",
                            "id": null,
                            "params": [
                                {
                                    "type": "Identifier",
                                    "name": "w",
                                    "range": [
                                        17,
                                        18
                                    ],
                                    "loc": {
                                        "start": {
                                            "line": 1,
                                            "column": 17
                                        },
                                        "end": {
                                            "line": 1,
                                            "column": 18
                                        }
                                    }
                                }
                            ],
                            "defaults": [],
                            "body": {
                                "type": "BlockStatement",
                                "body": [
                                    {
                                        "type": "ExpressionStatement",
                                        "expression": {
                                            "type": "AssignmentExpression",
                                            "operator": "=",
                                            "left": {
                                                "type": "Identifier",
                                                "name": "m_null",
                                                "range": [
                                                    22,
                                                    28
                                                ],
                                                "loc": {
                                                    "start": {
                                                        "line": 1,
                                                        "column": 22
                                                    },
                                                    "end": {
                                                        "line": 1,
                                                        "column": 28
                                                    }
                                                }
                                            },
                                            "right": {
                                                "type": "Identifier",
                                                "name": "w",
                                                "range": [
                                                    31,
                                                    32
                                                ],
                                                "loc": {
                                                    "start": {
                                                        "line": 1,
                                                        "column": 31
                                                    },
                                                    "end": {
                                                        "line": 1,
                                                        "column": 32
                                                    }
                                                }
                                            },
                                            "range": [
                                                22,
                                                32
                                            ],
                                            "loc": {
                                                "start": {
                                                    "line": 1,
                                                    "column": 22
                                                },
                                                "end": {
                                                    "line": 1,
                                                    "column": 32
                                                }
                                            }
                                        },
                                        "range": [
                                            22,
                                            33
                                        ],
                                        "loc": {
                                            "start": {
                                                "line": 1,
                                                "column": 22
                                            },
                                            "end": {
                                                "line": 1,
                                                "column": 33
                                            }
                                        }
                                    }
                                ],
                                "range": [
                                    20,
                                    34
                                ],
                                "loc": {
                                    "start": {
                                        "line": 1,
                                        "column": 20
                                    },
                                    "end": {
                                        "line": 1,
                                        "column": 34
                                    }
                                }
                            },
                            "rest": null,
                            "generator": false,
                            "expression": false,
                            "range": [
                                20,
                                34
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 20
                                },
                                "end": {
                                    "line": 1,
                                    "column": 34
                                }
                            }
                        },
                        "kind": "set",
                        "range": [
                            6,
                            34
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 6
                            },
                            "end": {
                                "line": 1,
                                "column": 34
                            }
                        }
                    }
                ],
                "range": [
                    4,
                    36
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 4
                    },
                    "end": {
                        "line": 1,
                        "column": 36
                    }
                }
            },
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
                    "line": 1,
                    "column": 36
                }
            }
        },
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
                "line": 1,
                "column": 36
            }
        }
    },
    "x = { set 10(w) { m_null = w } }": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "AssignmentExpression",
            "operator": "=",
            "left": {
                "type": "Identifier",
                "name": "x",
                "range": [
                    0,
                    1
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 1
                    }
                }
            },
            "right": {
                "type": "ObjectExpression",
                "properties": [
                    {
                        "type": "Property",
                        "key": {
                            "type": "Literal",
                            "value": 10,
                            "raw": "10",
                            "range": [
                                10,
                                12
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 10
                                },
                                "end": {
                                    "line": 1,
                                    "column": 12
                                }
                            }
                        },
                        "value": {
                            "type": "FunctionExpression",
                            "id": null,
                            "params": [
                                {
                                    "type": "Identifier",
                                    "name": "w",
                                    "range": [
                                        13,
                                        14
                                    ],
                                    "loc": {
                                        "start": {
                                            "line": 1,
                                            "column": 13
                                        },
                                        "end": {
                                            "line": 1,
                                            "column": 14
                                        }
                                    }
                                }
                            ],
                            "defaults": [],
                            "body": {
                                "type": "BlockStatement",
                                "body": [
                                    {
                                        "type": "ExpressionStatement",
                                        "expression": {
                                            "type": "AssignmentExpression",
                                            "operator": "=",
                                            "left": {
                                                "type": "Identifier",
                                                "name": "m_null",
                                                "range": [
                                                    18,
                                                    24
                                                ],
                                                "loc": {
                                                    "start": {
                                                        "line": 1,
                                                        "column": 18
                                                    },
                                                    "end": {
                                                        "line": 1,
                                                        "column": 24
                                                    }
                                                }
                                            },
                                            "right": {
                                                "type": "Identifier",
                                                "name": "w",
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
                                                18,
                                                28
                                            ],
                                            "loc": {
                                                "start": {
                                                    "line": 1,
                                                    "column": 18
                                                },
                                                "end": {
                                                    "line": 1,
                                                    "column": 28
                                                }
                                            }
                                        },
                                        "range": [
                                            18,
                                            29
                                        ],
                                        "loc": {
                                            "start": {
                                                "line": 1,
                                                "column": 18
                                            },
                                            "end": {
                                                "line": 1,
                                                "column": 29
                                            }
                                        }
                                    }
                                ],
                                "range": [
                                    16,
                                    30
                                ],
                                "loc": {
                                    "start": {
                                        "line": 1,
                                        "column": 16
                                    },
                                    "end": {
                                        "line": 1,
                                        "column": 30
                                    }
                                }
                            },
                            "rest": null,
                            "generator": false,
                            "expression": false,
                            "range": [
                                16,
                                30
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 16
                                },
                                "end": {
                                    "line": 1,
                                    "column": 30
                                }
                            }
                        },
                        "kind": "set",
                        "range": [
                            6,
                            30
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 6
                            },
                            "end": {
                                "line": 1,
                                "column": 30
                            }
                        }
                    }
                ],
                "range": [
                    4,
                    32
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 4
                    },
                    "end": {
                        "line": 1,
                        "column": 32
                    }
                }
            },
            "range": [
                0,
                32
            ],
            "loc": {
                "start": {
                    "line": 1,
                    "column": 0
                },
                "end": {
                    "line": 1,
                    "column": 32
                }
            }
        },
        "range": [
            0,
            32
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 0
            },
            "end": {
                "line": 1,
                "column": 32
            }
        }
    },
    "x = { get: 42 }": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "AssignmentExpression",
            "operator": "=",
            "left": {
                "type": "Identifier",
                "name": "x",
                "range": [
                    0,
                    1
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 1
                    }
                }
            },
            "right": {
                "type": "ObjectExpression",
                "properties": [
                    {
                        "type": "Property",
                        "key": {
                            "type": "Identifier",
                            "name": "get",
                            "range": [
                                6,
                                9
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 6
                                },
                                "end": {
                                    "line": 1,
                                    "column": 9
                                }
                            }
                        },
                        "value": {
                            "type": "Literal",
                            "value": 42,
                            "raw": "42",
                            "range": [
                                11,
                                13
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 11
                                },
                                "end": {
                                    "line": 1,
                                    "column": 13
                                }
                            }
                        },
                        "kind": "init",
                        "range": [
                            6,
                            13
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 6
                            },
                            "end": {
                                "line": 1,
                                "column": 13
                            }
                        }
                    }
                ],
                "range": [
                    4,
                    15
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 4
                    },
                    "end": {
                        "line": 1,
                        "column": 15
                    }
                }
            },
            "range": [
                0,
                15
            ],
            "loc": {
                "start": {
                    "line": 1,
                    "column": 0
                },
                "end": {
                    "line": 1,
                    "column": 15
                }
            }
        },
        "range": [
            0,
            15
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 0
            },
            "end": {
                "line": 1,
                "column": 15
            }
        }
    },
    "x = { set: 43 }": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "AssignmentExpression",
            "operator": "=",
            "left": {
                "type": "Identifier",
                "name": "x",
                "range": [
                    0,
                    1
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 1
                    }
                }
            },
            "right": {
                "type": "ObjectExpression",
                "properties": [
                    {
                        "type": "Property",
                        "key": {
                            "type": "Identifier",
                            "name": "set",
                            "range": [
                                6,
                                9
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 6
                                },
                                "end": {
                                    "line": 1,
                                    "column": 9
                                }
                            }
                        },
                        "value": {
                            "type": "Literal",
                            "value": 43,
                            "raw": "43",
                            "range": [
                                11,
                                13
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 11
                                },
                                "end": {
                                    "line": 1,
                                    "column": 13
                                }
                            }
                        },
                        "kind": "init",
                        "range": [
                            6,
                            13
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 6
                            },
                            "end": {
                                "line": 1,
                                "column": 13
                            }
                        }
                    }
                ],
                "range": [
                    4,
                    15
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 4
                    },
                    "end": {
                        "line": 1,
                        "column": 15
                    }
                }
            },
            "range": [
                0,
                15
            ],
            "loc": {
                "start": {
                    "line": 1,
                    "column": 0
                },
                "end": {
                    "line": 1,
                    "column": 15
                }
            }
        },
        "range": [
            0,
            15
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 0
            },
            "end": {
                "line": 1,
                "column": 15
            }
        }
    },
    "x = { __proto__: 2 }": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "AssignmentExpression",
            "operator": "=",
            "left": {
                "type": "Identifier",
                "name": "x",
                "range": [
                    0,
                    1
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 1
                    }
                }
            },
            "right": {
                "type": "ObjectExpression",
                "properties": [
                    {
                        "type": "Property",
                        "key": {
                            "type": "Identifier",
                            "name": "__proto__",
                            "range": [
                                6,
                                15
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 6
                                },
                                "end": {
                                    "line": 1,
                                    "column": 15
                                }
                            }
                        },
                        "value": {
                            "type": "Literal",
                            "value": 2,
                            "raw": "2",
                            "range": [
                                17,
                                18
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 17
                                },
                                "end": {
                                    "line": 1,
                                    "column": 18
                                }
                            }
                        },
                        "kind": "init",
                        "range": [
                            6,
                            18
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 6
                            },
                            "end": {
                                "line": 1,
                                "column": 18
                            }
                        }
                    }
                ],
                "range": [
                    4,
                    20
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 4
                    },
                    "end": {
                        "line": 1,
                        "column": 20
                    }
                }
            },
            "range": [
                0,
                20
            ],
            "loc": {
                "start": {
                    "line": 1,
                    "column": 0
                },
                "end": {
                    "line": 1,
                    "column": 20
                }
            }
        },
        "range": [
            0,
            20
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 0
            },
            "end": {
                "line": 1,
                "column": 20
            }
        }
    },
    "x = {\"__proto__\": 2 }": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "AssignmentExpression",
            "operator": "=",
            "left": {
                "type": "Identifier",
                "name": "x",
                "range": [
                    0,
                    1
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 1
                    }
                }
            },
            "right": {
                "type": "ObjectExpression",
                "properties": [
                    {
                        "type": "Property",
                        "key": {
                            "type": "Literal",
                            "value": "__proto__",
                            "raw": "\"__proto__\"",
                            "range": [
                                5,
                                16
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 5
                                },
                                "end": {
                                    "line": 1,
                                    "column": 16
                                }
                            }
                        },
                        "value": {
                            "type": "Literal",
                            "value": 2,
                            "raw": "2",
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
                        "kind": "init",
                        "range": [
                            5,
                            19
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 5
                            },
                            "end": {
                                "line": 1,
                                "column": 19
                            }
                        }
                    }
                ],
                "range": [
                    4,
                    21
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 4
                    },
                    "end": {
                        "line": 1,
                        "column": 21
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
    "x = { get width() { return m_width }, set width(width) { m_width = width; } }": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "AssignmentExpression",
            "operator": "=",
            "left": {
                "type": "Identifier",
                "name": "x",
                "range": [
                    0,
                    1
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 0
                    },
                    "end": {
                        "line": 1,
                        "column": 1
                    }
                }
            },
            "right": {
                "type": "ObjectExpression",
                "properties": [
                    {
                        "type": "Property",
                        "key": {
                            "type": "Identifier",
                            "name": "width",
                            "range": [
                                10,
                                15
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 10
                                },
                                "end": {
                                    "line": 1,
                                    "column": 15
                                }
                            }
                        },
                        "value": {
                            "type": "FunctionExpression",
                            "id": null,
                            "params": [],
                            "defaults": [],
                            "body": {
                                "type": "BlockStatement",
                                "body": [
                                    {
                                        "type": "ReturnStatement",
                                        "argument": {
                                            "type": "Identifier",
                                            "name": "m_width",
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
                                            }
                                        },
                                        "range": [
                                            20,
                                            35
                                        ],
                                        "loc": {
                                            "start": {
                                                "line": 1,
                                                "column": 20
                                            },
                                            "end": {
                                                "line": 1,
                                                "column": 35
                                            }
                                        }
                                    }
                                ],
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
                            },
                            "rest": null,
                            "generator": false,
                            "expression": false,
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
                        },
                        "kind": "get",
                        "range": [
                            6,
                            36
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 6
                            },
                            "end": {
                                "line": 1,
                                "column": 36
                            }
                        }
                    },
                    {
                        "type": "Property",
                        "key": {
                            "type": "Identifier",
                            "name": "width",
                            "range": [
                                42,
                                47
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 42
                                },
                                "end": {
                                    "line": 1,
                                    "column": 47
                                }
                            }
                        },
                        "value": {
                            "type": "FunctionExpression",
                            "id": null,
                            "params": [
                                {
                                    "type": "Identifier",
                                    "name": "width",
                                    "range": [
                                        48,
                                        53
                                    ],
                                    "loc": {
                                        "start": {
                                            "line": 1,
                                            "column": 48
                                        },
                                        "end": {
                                            "line": 1,
                                            "column": 53
                                        }
                                    }
                                }
                            ],
                            "defaults": [],
                            "body": {
                                "type": "BlockStatement",
                                "body": [
                                    {
                                        "type": "ExpressionStatement",
                                        "expression": {
                                            "type": "AssignmentExpression",
                                            "operator": "=",
                                            "left": {
                                                "type": "Identifier",
                                                "name": "m_width",
                                                "range": [
                                                    57,
                                                    64
                                                ],
                                                "loc": {
                                                    "start": {
                                                        "line": 1,
                                                        "column": 57
                                                    },
                                                    "end": {
                                                        "line": 1,
                                                        "column": 64
                                                    }
                                                }
                                            },
                                            "right": {
                                                "type": "Identifier",
                                                "name": "width",
                                                "range": [
                                                    67,
                                                    72
                                                ],
                                                "loc": {
                                                    "start": {
                                                        "line": 1,
                                                        "column": 67
                                                    },
                                                    "end": {
                                                        "line": 1,
                                                        "column": 72
                                                    }
                                                }
                                            },
                                            "range": [
                                                57,
                                                72
                                            ],
                                            "loc": {
                                                "start": {
                                                    "line": 1,
                                                    "column": 57
                                                },
                                                "end": {
                                                    "line": 1,
                                                    "column": 72
                                                }
                                            }
                                        },
                                        "range": [
                                            57,
                                            73
                                        ],
                                        "loc": {
                                            "start": {
                                                "line": 1,
                                                "column": 57
                                            },
                                            "end": {
                                                "line": 1,
                                                "column": 73
                                            }
                                        }
                                    }
                                ],
                                "range": [
                                    55,
                                    75
                                ],
                                "loc": {
                                    "start": {
                                        "line": 1,
                                        "column": 55
                                    },
                                    "end": {
                                        "line": 1,
                                        "column": 75
                                    }
                                }
                            },
                            "rest": null,
                            "generator": false,
                            "expression": false,
                            "range": [
                                55,
                                75
                            ],
                            "loc": {
                                "start": {
                                    "line": 1,
                                    "column": 55
                                },
                                "end": {
                                    "line": 1,
                                    "column": 75
                                }
                            }
                        },
                        "kind": "set",
                        "range": [
                            38,
                            75
                        ],
                        "loc": {
                            "start": {
                                "line": 1,
                                "column": 38
                            },
                            "end": {
                                "line": 1,
                                "column": 75
                            }
                        }
                    }
                ],
                "range": [
                    4,
                    77
                ],
                "loc": {
                    "start": {
                        "line": 1,
                        "column": 4
                    },
                    "end": {
                        "line": 1,
                        "column": 77
                    }
                }
            },
            "range": [
                0,
                77
            ],
            "loc": {
                "start": {
                    "line": 1,
                    "column": 0
                },
                "end": {
                    "line": 1,
                    "column": 77
                }
            }
        },
        "range": [
            0,
            77
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 0
            },
            "end": {
                "line": 1,
                "column": 77
            }
        }
    }
}
	');
}

} 