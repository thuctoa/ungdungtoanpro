
//#########################################################################################
//					Code for Example with jquery
//#########################################################################################
(function() {
    var n = 1;
    window.ShowStep = function() {
        document.getElementById("Step" + n).style.visibility = "visible";
        n++;
        if (!document.getElementById("Step" + n)) {
            document.getElementById("step").disabled = true;
        }
        document.getElementById("reset").disabled = false;
    };

    window.ResetSteps = function() {
        document.getElementById("step").disabled = false;
        document.getElementById("reset").disabled = true;
        var i = 1,
            step;
        n = 1;
        while (step == document.getElementById("Step" + i)) {
            step.style.visibility = "hidden";
            i++;
        }
    };
})();
//#########################################################################################
//					Code for Example with jquery								END
//#########################################################################################

var myApp = angular.module('myApp',[]);
function MyCtrl($scope) {
    //#########################################################################################
    //					Code for Example 1: angular and no 'align'
    //#########################################################################################
    $scope.xem=' \\begin{align} 2x^6+12x^6+1 \\end{align}';
    $scope.ex1 = {};
    $scope.ex1.currIndex = 0;
    
    $scope.ex1.someEquations = [{
        "name": "Pythagoras",
        "eq": "$ a^2 + b^2 $"
        }, {
        "name": "Lorentz Equation",
        "eq": "\\begin{align}\\dot{x} & = \\sigma(y-x) \\\\\\dot{y} & = \\rho x - y - xz \\\\\\dot{z} & = -\\beta z + xy\\end{align}"
        }, {
            "name": "An Identity of Ramanujan",
            "eq": "$$ \\frac{1} {(\\sqrt{\\phi \\sqrt{5}}-\\phi) e^{\\frac25 \\pi}} =1+\\frac{e^{-2\\pi}} {1+\\frac{e^{-4\\pi}} {1+\\frac{e^{-6\\pi}}{1+\\frac{e^{-8\\pi}} {1+\\ldots} } } } $$"
        }
    ];

    $scope.ex1.next = function() {
        console.log('hang = '+document.getElementById('hang').value);
        if ($scope.ex1.currIndex < $scope.ex1.someEquations.length) {
           
            $scope.ex1.currIndex++;
            console.log("i was clicked currIndex = " + $scope.ex1.currIndex);
        } else {
            console.log("all steps are visible");
        }
    };
    $scope.ex1.reset = function () {
		$scope.ex1.currIndex = 0;
                $scope.ex1.someEquations;
		MathJax.Hub.Queue(["Typeset", MathJax.Hub]);
    };
    // 

    //#########################################################################################
    //					Code for Example 1: angular and no 'align'						END
    //#########################################################################################


    //#########################################################################################
    //					Code for Example 2: angular and  'align'						
    //#########################################################################################
    $scope.ex2 = {};
    $scope.ex2.equation = "";
    $scope.ex2.currIndex = 0;

    $scope.ex2.eq_array = ["(x+1)^2 &= (x+1)(x+1)\\\\",
        "&= x(x+1) + 1(x+1)\\\\",
        "&= (x^2+x) + (x+1)\\\\",
        "&= x^2+(x+x) + 1\\\\",
        "&= x^2+(x+x) + 1\\\\"
    ];

    $scope.ex2.nextStep = function() {
		$scope.ex2.currIndex++;
        if ($scope.ex2.currIndex < $scope.ex2.eq_array.length) {

            $scope.ex2.equationToString();
            $scope.currentStep++;
        }
        //rerender Math content
        $scope.ex2.rerenderMath();
    };

    $scope.ex2.equationToString = function() {
        $scope.ex2.equation = "";
        
        for (var i = 0; i <= $scope.ex2.currIndex; ++i) {
			console.log("adding string");
			$scope.ex2.equation += document.getElementById('hang').value;
                       // $scope.ex2.eq_array[i];
        }
    };
    $scope.ex2.reset = function () {
		console.log("resetting:");
		$scope.ex2.currIndex = -1;
		$scope.ex2.equationToString();
		MathJax.Hub.Queue(["Typeset", MathJax.Hub]);
    };

    $scope.ex2.rerenderMath = function () {
		//console.log("rerendering math content");
		MathJax.Hub.Queue(["Typeset", MathJax.Hub]);
    };
    //#########################################################################################
    //					Code for Example 2: angular and  'align'						END
    //#########################################################################################

}