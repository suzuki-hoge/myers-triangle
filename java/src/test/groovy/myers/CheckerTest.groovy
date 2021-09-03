package myers

import spock.lang.Specification
import spock.lang.Unroll

@Unroll
class CheckerTest extends Specification {
    // 必要だと考えたテストを実装する
    // テストメソッドを分けたりしても良い
    def test() {
        expect:
        exp == Checker.apply(ss)

        where:
        ss              || exp
        ['3', '3', '3'] || '正三角形'
        ['5', '5', '5'] || '正三角形'
    }
}
