<?php
/**
 * Created by PhpStorm.
 * User: szaboferee
 * Date: 12/20/14
 * Time: 12:59 AM
 */

namespace test;


class NumericLiteralsTest extends BaseTestCase
{

	protected function getFixtures()
	{
		return json_decode('
		{
    "0": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "Literal",
            "value": 0,
            "raw": "0",
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
    "3": {
        "type": "Program",
        "body": [
            {
                "type": "ExpressionStatement",
                "expression": {
                    "type": "Literal",
                    "value": 3,
                    "raw": "3",
                    "range": [
                        0,
                        1
                    ]
                },
                "range": [
                    0,
                    1
                ]
            }
        ],
        "range": [
            0,
            1
        ],
        "tokens": [
            {
                "type": "Numeric",
                "value": "3",
                "range": [
                    0,
                    1
                ]
            }
        ]
    },
    "5": {
        "type": "Program",
        "body": [
            {
                "type": "ExpressionStatement",
                "expression": {
                    "type": "Literal",
                    "value": 5,
                    "raw": "5",
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
            }
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
        },
        "tokens": [
            {
                "type": "Numeric",
                "value": "5",
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
            }
        ]
    },
    "42": {
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
    ".14": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "Literal",
            "value": 0.14,
            "raw": ".14",
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
            }
        },
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
        }
    },
    "3.14159": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "Literal",
            "value": 3.14159,
            "raw": "3.14159",
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
    "6.02214179e+23": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "Literal",
            "value": 6.02214179e+23,
            "raw": "6.02214179e+23",
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
    "1.492417830e-10": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "Literal",
            "value": 1.49241783e-10,
            "raw": "1.492417830e-10",
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
    "0x0": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "Literal",
            "value": 0,
            "raw": "0x0",
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
            }
        },
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
        }
    },
    "0x0;": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "Literal",
            "value": 0,
            "raw": "0x0",
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
            }
        },
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
    },
    "0e+100 ": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "Literal",
            "value": 0,
            "raw": "0e+100",
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
    "0e+100": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "Literal",
            "value": 0,
            "raw": "0e+100",
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
    "0xabc": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "Literal",
            "value": 2748,
            "raw": "0xabc",
            "range": [
                0,
                5
            ],
            "loc": {
                "start": {
                    "line": 1,
                    "column": 0
                },
                "end": {
                    "line": 1,
                    "column": 5
                }
            }
        },
        "range": [
            0,
            5
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 0
            },
            "end": {
                "line": 1,
                "column": 5
            }
        }
    },
    "0xdef": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "Literal",
            "value": 3567,
            "raw": "0xdef",
            "range": [
                0,
                5
            ],
            "loc": {
                "start": {
                    "line": 1,
                    "column": 0
                },
                "end": {
                    "line": 1,
                    "column": 5
                }
            }
        },
        "range": [
            0,
            5
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 0
            },
            "end": {
                "line": 1,
                "column": 5
            }
        }
    },
    "0X1A": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "Literal",
            "value": 26,
            "raw": "0X1A",
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
        },
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
    },
    "0x10": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "Literal",
            "value": 16,
            "raw": "0x10",
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
        },
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
    },
    "0x100": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "Literal",
            "value": 256,
            "raw": "0x100",
            "range": [
                0,
                5
            ],
            "loc": {
                "start": {
                    "line": 1,
                    "column": 0
                },
                "end": {
                    "line": 1,
                    "column": 5
                }
            }
        },
        "range": [
            0,
            5
        ],
        "loc": {
            "start": {
                "line": 1,
                "column": 0
            },
            "end": {
                "line": 1,
                "column": 5
            }
        }
    },
    "0X04": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "Literal",
            "value": 4,
            "raw": "0X04",
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
        },
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
    },
    "02": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "Literal",
            "value": 2,
            "raw": "02",
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
    "012": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "Literal",
            "value": 10,
            "raw": "012",
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
            }
        },
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
        }
    },
    "0012": {
        "type": "ExpressionStatement",
        "expression": {
            "type": "Literal",
            "value": 10,
            "raw": "0012",
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
        },
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
}
		');
	}

} 