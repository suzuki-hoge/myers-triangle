package myers;

import org.junit.jupiter.params.ParameterizedTest;
import org.junit.jupiter.params.provider.CsvSource;

import static org.junit.jupiter.api.Assertions.assertEquals;

class CheckerTest {
    @ParameterizedTest
    @CsvSource({
            "3 3 3, 正三角形",
            "5 5 5, 正三角形",
    })
    void apply(String v, String exp) {
        // 必要だと考えたテストを実装する
        // テストメソッドを分けたりしても良い
        assertEquals(exp, Checker.apply(v));
    }
}
